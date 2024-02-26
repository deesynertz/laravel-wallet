<?php

namespace Deesynertz\Wallet\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Deesynertz\Wallet\Models\FinancialDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    // public const IS_BANK = 'Banks';
    // public const IS_MNOS = 'MNOs';
    // public const CHANNEL_TYPES_KEY  = [Str::lower(Channel::IS_BANK), Str::lower(Channel::IS_MNOS)];
    // public const CHANNEL_TYPES_ARR  = [Str::lower(Channel::IS_BANK) => Channel::IS_BANK, Str::lower(Channel::IS_MNOS) => Channel::IS_MNOS];
    // public const CHANNEL_TYPES_STR  = [Channel::IS_BANK, Channel::IS_MNOS];

    public const IS_BANK = 'Banks';
    public const IS_MNOS = 'MNOs';
    public array $channelTypesKey;
    public array $channelTypesArr;
    public array $channelTypesStr;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->channelTypesKey = [
            Str::lower(self::IS_BANK),
            Str::lower(self::IS_MNOS)
        ];

        $this->channelTypesArr = [
            Str::lower(self::IS_BANK) => self::IS_BANK,
            Str::lower(self::IS_MNOS) => self::IS_MNOS
        ];

        $this->channelTypesStr = [
            self::IS_BANK,
            self::IS_MNOS
        ];
    }

    public function activeChannels()
    {
        return $this->where('is_used', true);
    }


    public function financialDetails()
    {
        return $this->hasMany(FinancialDetail::class, 'channel_id', 'id');
    }

}
