<?php //550cdad2401c8e7fef56ba7a0653d8bb
/** @noinspection all */

namespace Illuminate\Notifications {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;

    /**
     * @property int $id
     * @property string $title
     * @property string $message
     * @property string $image
     * @property int|null $item_id
     * @property string $send_to
     * @property string|null $user_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Model $notifiable
     * @method MorphTo notifiable()
     * @method static _IH_DatabaseNotification_QB onWriteConnection()
     * @method _IH_DatabaseNotification_QB newQuery()
     * @method static _IH_DatabaseNotification_QB on(null|string $connection = null)
     * @method static _IH_DatabaseNotification_QB query()
     * @method static _IH_DatabaseNotification_QB with(array|string $relations)
     * @method _IH_DatabaseNotification_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static DatabaseNotificationCollection|DatabaseNotification[] all()
     * @ownLinks item_id,\App\Models\Item,id|user_id,\App\Models\User,id
     * @mixin _IH_DatabaseNotification_QB
     */
    class DatabaseNotification extends Model {}
}
