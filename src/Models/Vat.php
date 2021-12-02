<?php
/**
 * Eloquent IFRS Accounting
 *
 * @author    Edward Mungai
 * @copyright Edward Mungai, 2020, Germany
 * @license   MIT
 */

namespace Seyls\Accounting\Models;

use Database\Factories\VatFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Seyls\Accounting\Interfaces\Recyclable;
use Seyls\Accounting\Interfaces\Segregatable;

use Seyls\Accounting\Traits\Recycling;
use Seyls\Accounting\Traits\Segregating;
use Seyls\Accounting\Traits\ModelTablePrefix;

use Seyls\Accounting\Exceptions\MissingVatAccount;
use Seyls\Accounting\Exceptions\InvalidAccountType;

/**
 * Class Vat
 *
 * @package Ekmungai\Eloquent-IFRS
 *
 * @property Entity $entity
 * @property Account $account
 * @property string $code
 * @property string $name
 * @property float $rate
 * @property Carbon $destroyed_at
 * @property Carbon $deleted_at
 */
class Vat extends Model implements Segregatable, Recyclable
{
    use Segregating;
    use SoftDeletes;
    use Recycling;
    use ModelTablePrefix;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'rate',
        'valid_from',
        'account_id',
        'valid_to',
        'entity_id',
    ];

    protected static function newFactory()
    {
        return new VatFactory();
    }

    /**
     * Instance Identifier.
     *
     * @return string
     */
    public function toString($type = false) : string
    {
        $classname = explode('\\', self::class);
        $description = $this->name . ' (' . $this->code . ') at ' . number_format($this->rate, 2) . '%';
        return $type ? array_pop($classname) . ': ' . $description : $description;
    }

    /**
     * Vat attributes.
     *
     * @return object
     */
    public function attributes() : object
    {
        return (object)$this->attributes;
    }

    /**
     * LineItem Vat Account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    /**
     * Vat Validation.
     */
    public function save(array $options = []): bool
    {
        if (!is_null($this->rate)) {
            $this->rate = abs($this->rate);
        }

        if ($this->rate == 0) {
            $this->account_id = null;
        }

        if ($this->rate > 0 && is_null($this->account_id)) {
            throw new MissingVatAccount($this->rate);
        }

        if ($this->rate > 0 && $this->account->account_type != Account::CONTROL) {
            throw new InvalidAccountType('Vat', Account::CONTROL);
        }

        return parent::save();
    }
}
