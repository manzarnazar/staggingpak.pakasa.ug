<?php //3b1dd52add6bb7d657ca229b081b5509
/** @noinspection all */

namespace App\Models {

    use Database\Factories\UserFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasManyThrough;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravel\Sanctum\PersonalAccessToken;
    use LaravelIdea\Helper\App\Models\_IH_Area_C;
    use LaravelIdea\Helper\App\Models\_IH_Area_QB;
    use LaravelIdea\Helper\App\Models\_IH_BlockUser_C;
    use LaravelIdea\Helper\App\Models\_IH_BlockUser_QB;
    use LaravelIdea\Helper\App\Models\_IH_Blog_C;
    use LaravelIdea\Helper\App\Models\_IH_Blog_QB;
    use LaravelIdea\Helper\App\Models\_IH_CategoryTranslation_C;
    use LaravelIdea\Helper\App\Models\_IH_CategoryTranslation_QB;
    use LaravelIdea\Helper\App\Models\_IH_Category_C;
    use LaravelIdea\Helper\App\Models\_IH_Category_QB;
    use LaravelIdea\Helper\App\Models\_IH_Chat_C;
    use LaravelIdea\Helper\App\Models\_IH_Chat_QB;
    use LaravelIdea\Helper\App\Models\_IH_City_C;
    use LaravelIdea\Helper\App\Models\_IH_City_QB;
    use LaravelIdea\Helper\App\Models\_IH_Country_C;
    use LaravelIdea\Helper\App\Models\_IH_Country_QB;
    use LaravelIdea\Helper\App\Models\_IH_CustomFieldCategory_C;
    use LaravelIdea\Helper\App\Models\_IH_CustomFieldCategory_QB;
    use LaravelIdea\Helper\App\Models\_IH_CustomField_C;
    use LaravelIdea\Helper\App\Models\_IH_CustomField_QB;
    use LaravelIdea\Helper\App\Models\_IH_Faq_C;
    use LaravelIdea\Helper\App\Models\_IH_Faq_QB;
    use LaravelIdea\Helper\App\Models\_IH_Favourite_C;
    use LaravelIdea\Helper\App\Models\_IH_Favourite_QB;
    use LaravelIdea\Helper\App\Models\_IH_FeaturedItems_C;
    use LaravelIdea\Helper\App\Models\_IH_FeaturedItems_QB;
    use LaravelIdea\Helper\App\Models\_IH_FeatureSection_C;
    use LaravelIdea\Helper\App\Models\_IH_FeatureSection_QB;
    use LaravelIdea\Helper\App\Models\_IH_ItemCustomFieldValue_C;
    use LaravelIdea\Helper\App\Models\_IH_ItemCustomFieldValue_QB;
    use LaravelIdea\Helper\App\Models\_IH_ItemImages_C;
    use LaravelIdea\Helper\App\Models\_IH_ItemImages_QB;
    use LaravelIdea\Helper\App\Models\_IH_ItemOffer_C;
    use LaravelIdea\Helper\App\Models\_IH_ItemOffer_QB;
    use LaravelIdea\Helper\App\Models\_IH_Item_C;
    use LaravelIdea\Helper\App\Models\_IH_Item_QB;
    use LaravelIdea\Helper\App\Models\_IH_Language_C;
    use LaravelIdea\Helper\App\Models\_IH_Language_QB;
    use LaravelIdea\Helper\App\Models\_IH_Notifications_C;
    use LaravelIdea\Helper\App\Models\_IH_Notifications_QB;
    use LaravelIdea\Helper\App\Models\_IH_Package_C;
    use LaravelIdea\Helper\App\Models\_IH_Package_QB;
    use LaravelIdea\Helper\App\Models\_IH_PaymentConfiguration_C;
    use LaravelIdea\Helper\App\Models\_IH_PaymentConfiguration_QB;
    use LaravelIdea\Helper\App\Models\_IH_PaymentTransaction_C;
    use LaravelIdea\Helper\App\Models\_IH_PaymentTransaction_QB;
    use LaravelIdea\Helper\App\Models\_IH_ReportReason_C;
    use LaravelIdea\Helper\App\Models\_IH_ReportReason_QB;
    use LaravelIdea\Helper\App\Models\_IH_Setting_C;
    use LaravelIdea\Helper\App\Models\_IH_Setting_QB;
    use LaravelIdea\Helper\App\Models\_IH_Slider_C;
    use LaravelIdea\Helper\App\Models\_IH_Slider_QB;
    use LaravelIdea\Helper\App\Models\_IH_SocialLogin_C;
    use LaravelIdea\Helper\App\Models\_IH_SocialLogin_QB;
    use LaravelIdea\Helper\App\Models\_IH_State_C;
    use LaravelIdea\Helper\App\Models\_IH_State_QB;
    use LaravelIdea\Helper\App\Models\_IH_TipTranslation_C;
    use LaravelIdea\Helper\App\Models\_IH_TipTranslation_QB;
    use LaravelIdea\Helper\App\Models\_IH_Tip_C;
    use LaravelIdea\Helper\App\Models\_IH_Tip_QB;
    use LaravelIdea\Helper\App\Models\_IH_UserPurchasedPackage_C;
    use LaravelIdea\Helper\App\Models\_IH_UserPurchasedPackage_QB;
    use LaravelIdea\Helper\App\Models\_IH_UserReports_C;
    use LaravelIdea\Helper\App\Models\_IH_UserReports_QB;
    use LaravelIdea\Helper\App\Models\_IH_User_C;
    use LaravelIdea\Helper\App\Models\_IH_User_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_C;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_QB;
    use LaravelIdea\Helper\Spatie\Permission\Models\_IH_Permission_C;
    use LaravelIdea\Helper\Spatie\Permission\Models\_IH_Permission_QB;
    use LaravelIdea\Helper\Spatie\Permission\Models\_IH_Role_C;
    use LaravelIdea\Helper\Spatie\Permission\Models\_IH_Role_QB;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    /**
     * @property int $id
     * @property string $name
     * @property int $city_id
     * @property int $state_id
     * @property string|null $state_code
     * @property int $country_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property City $city
     * @method BelongsTo|_IH_City_QB city()
     * @property Country $country
     * @method BelongsTo|_IH_Country_QB country()
     * @property State $state
     * @method BelongsTo|_IH_State_QB state()
     * @method static _IH_Area_QB onWriteConnection()
     * @method _IH_Area_QB newQuery()
     * @method static _IH_Area_QB on(null|string $connection = null)
     * @method static _IH_Area_QB query()
     * @method static _IH_Area_QB with(array|string $relations)
     * @method _IH_Area_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Area_C|Area[] all()
     * @ownLinks city_id,\App\Models\City,id|state_id,\App\Models\State,id|country_id,\App\Models\Country,id
     * @foreignLinks id,\App\Models\Item,area_id
     * @mixin _IH_Area_QB
     */
    class Area extends Model {}

    /**
     * @property int $id
     * @property int $user_id
     * @property int $blocked_user_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_BlockUser_QB onWriteConnection()
     * @method _IH_BlockUser_QB newQuery()
     * @method static _IH_BlockUser_QB on(null|string $connection = null)
     * @method static _IH_BlockUser_QB query()
     * @method static _IH_BlockUser_QB with(array|string $relations)
     * @method _IH_BlockUser_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_BlockUser_C|BlockUser[] all()
     * @ownLinks user_id,\App\Models\User,id
     * @mixin _IH_BlockUser_QB
     */
    class BlockUser extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $slug
     * @property string|null $description
     * @property string $image
     * @property string|null $tags
     * @property int $views
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Category $category
     * @method BelongsTo|_IH_Category_QB category()
     * @method static _IH_Blog_QB onWriteConnection()
     * @method _IH_Blog_QB newQuery()
     * @method static _IH_Blog_QB on(null|string $connection = null)
     * @method static _IH_Blog_QB query()
     * @method static _IH_Blog_QB with(array|string $relations)
     * @method _IH_Blog_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Blog_C|Blog[] all()
     * @mixin _IH_Blog_QB
     */
    class Blog extends Model {}

    /**
     * @property int $id
     * @property int|null $sequence
     * @property string $name
     * @property string $image
     * @property int|null $parent_category_id
     * @property string|null $description
     * @property bool $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property string $slug
     * @property-read $translated_name attribute
     * @property _IH_CustomFieldCategory_C|CustomFieldCategory[] $custom_fields
     * @property-read int $custom_fields_count
     * @method HasMany|_IH_CustomFieldCategory_QB custom_fields()
     * @property _IH_Item_C|Item[] $items
     * @property-read int $items_count
     * @method HasMany|_IH_Item_QB items()
     * @property Slider $slider
     * @method MorphToMany|_IH_Slider_QB slider()
     * @property _IH_Category_C|Category[] $subcategories
     * @property-read int $subcategories_count
     * @method HasMany|_IH_Category_QB subcategories()
     * @property _IH_CategoryTranslation_C|CategoryTranslation[] $translations
     * @property-read int $translations_count
     * @method HasMany|_IH_CategoryTranslation_QB translations()
     * @method static _IH_Category_QB onWriteConnection()
     * @method _IH_Category_QB newQuery()
     * @method static _IH_Category_QB on(null|string $connection = null)
     * @method static _IH_Category_QB query()
     * @method static _IH_Category_QB with(array|string $relations)
     * @method _IH_Category_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Category_C|Category[] all()
     * @foreignLinks id,\App\Models\CustomFieldCategory,category_id|id,\App\Models\Item,category_id|id,\App\Models\CategoryTranslation,category_id
     * @mixin _IH_Category_QB
     */
    class Category extends Model {}

    /**
     * @property int $id
     * @property int $category_id
     * @property int $language_id
     * @property string $name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Category $category
     * @method BelongsTo|_IH_Category_QB category()
     * @property Language $language
     * @method BelongsTo|_IH_Language_QB language()
     * @method static _IH_CategoryTranslation_QB onWriteConnection()
     * @method _IH_CategoryTranslation_QB newQuery()
     * @method static _IH_CategoryTranslation_QB on(null|string $connection = null)
     * @method static _IH_CategoryTranslation_QB query()
     * @method static _IH_CategoryTranslation_QB with(array|string $relations)
     * @method _IH_CategoryTranslation_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_CategoryTranslation_C|CategoryTranslation[] all()
     * @ownLinks category_id,\App\Models\Category,id|language_id,\App\Models\Language,id
     * @mixin _IH_CategoryTranslation_QB
     */
    class CategoryTranslation extends Model {}

    /**
     * @property int $id
     * @property int $sender_id
     * @property int $item_offer_id
     * @property string|null $message
     * @property string|null $file
     * @property string|null $audio
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read string $message_type attribute
     * @property User $sender
     * @method BelongsTo|_IH_User_QB sender()
     * @method static _IH_Chat_QB onWriteConnection()
     * @method _IH_Chat_QB newQuery()
     * @method static _IH_Chat_QB on(null|string $connection = null)
     * @method static _IH_Chat_QB query()
     * @method static _IH_Chat_QB with(array|string $relations)
     * @method _IH_Chat_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Chat_C|Chat[] all()
     * @ownLinks item_offer_id,\App\Models\ItemOffer,id
     * @mixin _IH_Chat_QB
     */
    class Chat extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property int $state_id
     * @property string $state_code
     * @property int $country_id
     * @property string $country_code
     * @property float|null $latitude
     * @property float|null $longitude
     * @property bool|null $flag
     * @property string|null $wikiDataId
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Country $country
     * @method BelongsTo|_IH_Country_QB country()
     * @property State $state
     * @method BelongsTo|_IH_State_QB state()
     * @method static _IH_City_QB onWriteConnection()
     * @method _IH_City_QB newQuery()
     * @method static _IH_City_QB on(null|string $connection = null)
     * @method static _IH_City_QB query()
     * @method static _IH_City_QB with(array|string $relations)
     * @method _IH_City_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_City_C|City[] all()
     * @ownLinks state_id,\App\Models\State,id|country_id,\App\Models\Country,id
     * @foreignLinks id,\App\Models\Area,city_id
     * @mixin _IH_City_QB
     */
    class City extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string|null $iso3
     * @property string|null $numeric_code
     * @property string|null $iso2
     * @property string|null $phonecode
     * @property string|null $capital
     * @property string|null $currency
     * @property string|null $currency_name
     * @property string|null $currency_symbol
     * @property string|null $tld
     * @property string|null $native
     * @property string|null $region
     * @property int|null $region_id
     * @property string|null $subregion
     * @property int|null $subregion_id
     * @property string|null $nationality
     * @property string|null $timezones
     * @property string|null $translations
     * @property float|null $latitude
     * @property float|null $longitude
     * @property string|null $emoji
     * @property string|null $emojiU
     * @property bool|null $flag
     * @property string|null $wikiDataId
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Country_QB onWriteConnection()
     * @method _IH_Country_QB newQuery()
     * @method static _IH_Country_QB on(null|string $connection = null)
     * @method static _IH_Country_QB query()
     * @method static _IH_Country_QB with(array|string $relations)
     * @method _IH_Country_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Country_C|Country[] all()
     * @foreignLinks id,\App\Models\State,country_id|id,\App\Models\City,country_id|id,\App\Models\Area,country_id
     * @mixin _IH_Country_QB
     */
    class Country extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $type
     * @property string $image
     * @property bool $required
     * @property string|null $values
     * @property int|null $min_length
     * @property int|null $max_length
     * @property bool $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_Category_C|Category[] $categories
     * @property-read int $categories_count
     * @method BelongsToMany|_IH_Category_QB categories()
     * @property _IH_CustomFieldCategory_C|CustomFieldCategory[] $custom_field_category
     * @property-read int $custom_field_category_count
     * @method HasMany|_IH_CustomFieldCategory_QB custom_field_category()
     * @property _IH_ItemCustomFieldValue_C|ItemCustomFieldValue[] $item_custom_field_values
     * @property-read int $item_custom_field_values_count
     * @method HasMany|_IH_ItemCustomFieldValue_QB item_custom_field_values()
     * @method static _IH_CustomField_QB onWriteConnection()
     * @method _IH_CustomField_QB newQuery()
     * @method static _IH_CustomField_QB on(null|string $connection = null)
     * @method static _IH_CustomField_QB query()
     * @method static _IH_CustomField_QB with(array|string $relations)
     * @method _IH_CustomField_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_CustomField_C|CustomField[] all()
     * @foreignLinks id,\App\Models\CustomFieldCategory,custom_field_id|id,\App\Models\ItemCustomFieldValue,custom_field_id
     * @mixin _IH_CustomField_QB
     */
    class CustomField extends Model {}

    /**
     * @property int $id
     * @property int $category_id
     * @property int $custom_field_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Category $category
     * @method HasOne|_IH_Category_QB category()
     * @property CustomField $custom_fields
     * @method HasOne|_IH_CustomField_QB custom_fields()
     * @method static _IH_CustomFieldCategory_QB onWriteConnection()
     * @method _IH_CustomFieldCategory_QB newQuery()
     * @method static _IH_CustomFieldCategory_QB on(null|string $connection = null)
     * @method static _IH_CustomFieldCategory_QB query()
     * @method static _IH_CustomFieldCategory_QB with(array|string $relations)
     * @method _IH_CustomFieldCategory_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_CustomFieldCategory_C|CustomFieldCategory[] all()
     * @ownLinks category_id,\App\Models\Category,id|custom_field_id,\App\Models\CustomField,id
     * @mixin _IH_CustomFieldCategory_QB
     */
    class CustomFieldCategory extends Model {}

    /**
     * @property int $id
     * @property string $question
     * @property string $answer
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Faq_QB onWriteConnection()
     * @method _IH_Faq_QB newQuery()
     * @method static _IH_Faq_QB on(null|string $connection = null)
     * @method static _IH_Faq_QB query()
     * @method static _IH_Faq_QB with(array|string $relations)
     * @method _IH_Faq_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Faq_C|Faq[] all()
     * @mixin _IH_Faq_QB
     */
    class Faq extends Model {}

    /**
     * @property int $id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int $user_id
     * @property int $item_id
     * @method static _IH_Favourite_QB onWriteConnection()
     * @method _IH_Favourite_QB newQuery()
     * @method static _IH_Favourite_QB on(null|string $connection = null)
     * @method static _IH_Favourite_QB query()
     * @method static _IH_Favourite_QB with(array|string $relations)
     * @method _IH_Favourite_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Favourite_C|Favourite[] all()
     * @ownLinks user_id,\App\Models\User,id|item_id,\App\Models\Item,id
     * @mixin _IH_Favourite_QB
     */
    class Favourite extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property int $sequence
     * @property string $filter
     * @property string|null $value
     * @property string $style
     * @property int|null $min_price
     * @property int|null $max_price
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Category $category
     * @method BelongsTo|_IH_Category_QB category()
     * @method static _IH_FeatureSection_QB onWriteConnection()
     * @method _IH_FeatureSection_QB newQuery()
     * @method static _IH_FeatureSection_QB on(null|string $connection = null)
     * @method static _IH_FeatureSection_QB query()
     * @method static _IH_FeatureSection_QB with(array|string $relations)
     * @method _IH_FeatureSection_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_FeatureSection_C|FeatureSection[] all()
     * @mixin _IH_FeatureSection_QB
     */
    class FeatureSection extends Model {}

    /**
     * @property int $id
     * @property Carbon $start_date
     * @property Carbon|null $end_date
     * @property int $item_id
     * @property int $package_id
     * @property int $user_purchased_package_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Item $item
     * @method BelongsTo|_IH_Item_QB item()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_FeaturedItems_QB onWriteConnection()
     * @method _IH_FeaturedItems_QB newQuery()
     * @method static _IH_FeaturedItems_QB on(null|string $connection = null)
     * @method static _IH_FeaturedItems_QB query()
     * @method static _IH_FeaturedItems_QB with(array|string $relations)
     * @method _IH_FeaturedItems_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_FeaturedItems_C|FeaturedItems[] all()
     * @ownLinks item_id,\App\Models\Item,id|package_id,\App\Models\Package,id|user_purchased_package_id,\App\Models\UserPurchasedPackage,id
     * @mixin _IH_FeaturedItems_QB
     */
    class FeaturedItems extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $description
     * @property float $price
     * @property string $image
     * @property string|null $watermark_image
     * @property float $latitude
     * @property float $longitude
     * @property string $address
     * @property string $contact
     * @property bool $show_only_to_premium
     * @property string $status
     * @property string|null $video_link
     * @property string $city
     * @property string|null $state
     * @property string $country
     * @property int $user_id
     * @property int $category_id
     * @property string|null $all_category_ids
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property int $clicks
     * @property int|null $area_id
     * @property string $slug
     * @property string|null $rejected_reason
     * @property Area|null $area
     * @method BelongsTo|_IH_Area_QB area()
     * @property Category $category
     * @method BelongsTo|_IH_Category_QB category()
     * @property _IH_CustomField_C|CustomField[] $custom_fields
     * @property-read int $custom_fields_count
     * @method HasManyThrough|_IH_CustomField_QB custom_fields()
     * @property _IH_Favourite_C|Favourite[] $favourites
     * @property-read int $favourites_count
     * @method HasMany|_IH_Favourite_QB favourites()
     * @property _IH_FeaturedItems_C|FeaturedItems[] $featured_items
     * @property-read int $featured_items_count
     * @method HasMany|_IH_FeaturedItems_QB featured_items()
     * @property _IH_ItemImages_C|ItemImages[] $gallery_images
     * @property-read int $gallery_images_count
     * @method HasMany|_IH_ItemImages_QB gallery_images()
     * @property _IH_ItemCustomFieldValue_C|ItemCustomFieldValue[] $item_custom_field_values
     * @property-read int $item_custom_field_values_count
     * @method HasMany|_IH_ItemCustomFieldValue_QB item_custom_field_values()
     * @property _IH_ItemOffer_C|ItemOffer[] $item_offers
     * @property-read int $item_offers_count
     * @method HasMany|_IH_ItemOffer_QB item_offers()
     * @property _IH_Slider_C|Slider[] $sliders
     * @property-read int $sliders_count
     * @method MorphToMany|_IH_Slider_QB sliders()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @property _IH_UserReports_C|UserReports[] $user_reports
     * @property-read int $user_reports_count
     * @method HasMany|_IH_UserReports_QB user_reports()
     * @method static _IH_Item_QB onWriteConnection()
     * @method _IH_Item_QB newQuery()
     * @method static _IH_Item_QB on(null|string $connection = null)
     * @method static _IH_Item_QB query()
     * @method static _IH_Item_QB with(array|string $relations)
     * @method _IH_Item_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Item_C|Item[] all()
     * @ownLinks user_id,\App\Models\User,id|category_id,\App\Models\Category,id|area_id,\App\Models\Area,id
     * @foreignLinks id,\App\Models\ItemCustomFieldValue,item_id|id,\App\Models\ItemImages,item_id|id,\App\Models\UserReports,item_id|id,\Illuminate\Notifications\DatabaseNotification,item_id|id,\App\Models\FeaturedItems,item_id|id,\App\Models\Favourite,item_id|id,\App\Models\ItemOffer,item_id
     * @mixin _IH_Item_QB
     */
    class Item extends Model {}

    /**
     * @property int $id
     * @property int $item_id
     * @property int $custom_field_id
     * @property string|null $value
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property CustomField $custom_field
     * @method BelongsTo|_IH_CustomField_QB custom_field()
     * @method static _IH_ItemCustomFieldValue_QB onWriteConnection()
     * @method _IH_ItemCustomFieldValue_QB newQuery()
     * @method static _IH_ItemCustomFieldValue_QB on(null|string $connection = null)
     * @method static _IH_ItemCustomFieldValue_QB query()
     * @method static _IH_ItemCustomFieldValue_QB with(array|string $relations)
     * @method _IH_ItemCustomFieldValue_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ItemCustomFieldValue_C|ItemCustomFieldValue[] all()
     * @ownLinks item_id,\App\Models\Item,id|custom_field_id,\App\Models\CustomField,id
     * @mixin _IH_ItemCustomFieldValue_QB
     */
    class ItemCustomFieldValue extends Model {}

    /**
     * @property int $id
     * @property string $image
     * @property int $item_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ItemImages_QB onWriteConnection()
     * @method _IH_ItemImages_QB newQuery()
     * @method static _IH_ItemImages_QB on(null|string $connection = null)
     * @method static _IH_ItemImages_QB query()
     * @method static _IH_ItemImages_QB with(array|string $relations)
     * @method _IH_ItemImages_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ItemImages_C|ItemImages[] all()
     * @ownLinks item_id,\App\Models\Item,id
     * @mixin _IH_ItemImages_QB
     */
    class ItemImages extends Model {}

    /**
     * @property int $id
     * @property int $seller_id
     * @property int $buyer_id
     * @property int $item_id
     * @property float $amount
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property User $buyer
     * @method BelongsTo|_IH_User_QB buyer()
     * @property Item $item
     * @method BelongsTo|_IH_Item_QB item()
     * @property User $seller
     * @method BelongsTo|_IH_User_QB seller()
     * @method static _IH_ItemOffer_QB onWriteConnection()
     * @method _IH_ItemOffer_QB newQuery()
     * @method static _IH_ItemOffer_QB on(null|string $connection = null)
     * @method static _IH_ItemOffer_QB query()
     * @method static _IH_ItemOffer_QB with(array|string $relations)
     * @method _IH_ItemOffer_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ItemOffer_C|ItemOffer[] all()
     * @ownLinks item_id,\App\Models\Item,id
     * @foreignLinks id,\App\Models\Chat,item_offer_id
     * @mixin _IH_ItemOffer_QB
     */
    class ItemOffer extends Model {}

    /**
     * @property int $id
     * @property string $code
     * @property string $name
     * @property string $app_file
     * @property string $panel_file
     * @property bool $rtl
     * @property string|null $image
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property string $name_in_english
     * @property string $slug
     * @property string $web_file
     * @method static _IH_Language_QB onWriteConnection()
     * @method _IH_Language_QB newQuery()
     * @method static _IH_Language_QB on(null|string $connection = null)
     * @method static _IH_Language_QB query()
     * @method static _IH_Language_QB with(array|string $relations)
     * @method _IH_Language_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Language_C|Language[] all()
     * @foreignLinks id,\App\Models\TipTranslation,language_id|id,\App\Models\CategoryTranslation,language_id
     * @mixin _IH_Language_QB
     */
    class Language extends Model {}

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
     * @method static _IH_Notifications_QB onWriteConnection()
     * @method _IH_Notifications_QB newQuery()
     * @method static _IH_Notifications_QB on(null|string $connection = null)
     * @method static _IH_Notifications_QB query()
     * @method static _IH_Notifications_QB with(array|string $relations)
     * @method _IH_Notifications_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Notifications_C|Notifications[] all()
     * @ownLinks item_id,\App\Models\Item,id|user_id,\App\Models\User,id
     * @mixin _IH_Notifications_QB
     */
    class Notifications extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $duration
     * @property string $item_limit
     * @property string $type
     * @property string $icon
     * @property string $description
     * @property int $status
     * @property string|null $ios_product_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property float $discount_in_percentage
     * @property float $final_price
     * @property float $price
     * @property _IH_UserPurchasedPackage_C|UserPurchasedPackage[] $user_purchased_packages
     * @property-read int $user_purchased_packages_count
     * @method HasMany|_IH_UserPurchasedPackage_QB user_purchased_packages()
     * @method static _IH_Package_QB onWriteConnection()
     * @method _IH_Package_QB newQuery()
     * @method static _IH_Package_QB on(null|string $connection = null)
     * @method static _IH_Package_QB query()
     * @method static _IH_Package_QB with(array|string $relations)
     * @method _IH_Package_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Package_C|Package[] all()
     * @foreignLinks id,\App\Models\UserPurchasedPackage,package_id|id,\App\Models\FeaturedItems,package_id
     * @mixin _IH_Package_QB
     */
    class Package extends Model {}

    /**
     * @property int $id
     * @property string $payment_method
     * @property string $api_key
     * @property string $secret_key
     * @property string $webhook_secret_key
     * @property string|null $currency_code
     * @property bool $status 0 - Disabled, 1 - Enabled
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_PaymentConfiguration_QB onWriteConnection()
     * @method _IH_PaymentConfiguration_QB newQuery()
     * @method static _IH_PaymentConfiguration_QB on(null|string $connection = null)
     * @method static _IH_PaymentConfiguration_QB query()
     * @method static _IH_PaymentConfiguration_QB with(array|string $relations)
     * @method _IH_PaymentConfiguration_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_PaymentConfiguration_C|PaymentConfiguration[] all()
     * @mixin _IH_PaymentConfiguration_QB
     */
    class PaymentConfiguration extends Model {}

    /**
     * @property int $id
     * @property int $user_id
     * @property float $amount
     * @property string $payment_gateway
     * @property string|null $order_id order_id / payment_intent_id
     * @property string $payment_status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_PaymentTransaction_QB onWriteConnection()
     * @method _IH_PaymentTransaction_QB newQuery()
     * @method static _IH_PaymentTransaction_QB on(null|string $connection = null)
     * @method static _IH_PaymentTransaction_QB query()
     * @method static _IH_PaymentTransaction_QB with(array|string $relations)
     * @method _IH_PaymentTransaction_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_PaymentTransaction_C|PaymentTransaction[] all()
     * @ownLinks user_id,\App\Models\User,id
     * @foreignLinks id,\App\Models\UserPurchasedPackage,payment_transactions_id
     * @mixin _IH_PaymentTransaction_QB
     */
    class PaymentTransaction extends Model {}

    /**
     * @property int $id
     * @property string $reason
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ReportReason_QB onWriteConnection()
     * @method _IH_ReportReason_QB newQuery()
     * @method static _IH_ReportReason_QB on(null|string $connection = null)
     * @method static _IH_ReportReason_QB query()
     * @method static _IH_ReportReason_QB with(array|string $relations)
     * @method _IH_ReportReason_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ReportReason_C|ReportReason[] all()
     * @foreignLinks id,\App\Models\UserReports,report_reason_id
     * @mixin _IH_ReportReason_QB
     */
    class ReportReason extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string|null $value
     * @property string $type
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Setting_QB onWriteConnection()
     * @method _IH_Setting_QB newQuery()
     * @method static _IH_Setting_QB on(null|string $connection = null)
     * @method static _IH_Setting_QB query()
     * @method static _IH_Setting_QB with(array|string $relations)
     * @method _IH_Setting_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Setting_C|Setting[] all()
     * @mixin _IH_Setting_QB
     */
    class Setting extends Model {}

    /**
     * @property int $id
     * @property string $image
     * @property string $sequence
     * @property string|null $third_party_link
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int|null $model_id
     * @property string|null $model_type
     * @property Category $categories
     * @method HasOne|_IH_Category_QB categories()
     * @property Item $item
     * @method BelongsTo|_IH_Item_QB item()
     * @property Model $model
     * @method MorphTo model()
     * @method static _IH_Slider_QB onWriteConnection()
     * @method _IH_Slider_QB newQuery()
     * @method static _IH_Slider_QB on(null|string $connection = null)
     * @method static _IH_Slider_QB query()
     * @method static _IH_Slider_QB with(array|string $relations)
     * @method _IH_Slider_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Slider_C|Slider[] all()
     * @mixin _IH_Slider_QB
     */
    class Slider extends Model {}

    /**
     * @property int $id
     * @property int $user_id
     * @property string $firebase_id
     * @property string $type
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_SocialLogin_QB onWriteConnection()
     * @method _IH_SocialLogin_QB newQuery()
     * @method static _IH_SocialLogin_QB on(null|string $connection = null)
     * @method static _IH_SocialLogin_QB query()
     * @method static _IH_SocialLogin_QB with(array|string $relations)
     * @method _IH_SocialLogin_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_SocialLogin_C|SocialLogin[] all()
     * @ownLinks user_id,\App\Models\User,id
     * @mixin _IH_SocialLogin_QB
     */
    class SocialLogin extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property int $country_id
     * @property string $state_code
     * @property string|null $fips_code
     * @property string|null $iso2
     * @property string|null $type
     * @property float|null $latitude
     * @property float|null $longitude
     * @property bool|null $flag
     * @property string|null $wikiDataId
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Country $country
     * @method BelongsTo|_IH_Country_QB country()
     * @method static _IH_State_QB onWriteConnection()
     * @method _IH_State_QB newQuery()
     * @method static _IH_State_QB on(null|string $connection = null)
     * @method static _IH_State_QB query()
     * @method static _IH_State_QB with(array|string $relations)
     * @method _IH_State_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_State_C|State[] all()
     * @ownLinks country_id,\App\Models\Country,id
     * @foreignLinks id,\App\Models\City,state_id|id,\App\Models\Area,state_id
     * @mixin _IH_State_QB
     */
    class State extends Model {}

    /**
     * @property int $id
     * @property string $description
     * @property int $sequence
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property-read $translated_name attribute
     * @property _IH_TipTranslation_C|TipTranslation[] $translations
     * @property-read int $translations_count
     * @method HasMany|_IH_TipTranslation_QB translations()
     * @method static _IH_Tip_QB onWriteConnection()
     * @method _IH_Tip_QB newQuery()
     * @method static _IH_Tip_QB on(null|string $connection = null)
     * @method static _IH_Tip_QB query()
     * @method static _IH_Tip_QB with(array|string $relations)
     * @method _IH_Tip_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Tip_C|Tip[] all()
     * @foreignLinks id,\App\Models\TipTranslation,tip_id
     * @mixin _IH_Tip_QB
     */
    class Tip extends Model {}

    /**
     * @property int $id
     * @property int $tip_id
     * @property int $language_id
     * @property string $description
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Language $language
     * @method BelongsTo|_IH_Language_QB language()
     * @property Tip $tip
     * @method BelongsTo|_IH_Tip_QB tip()
     * @method static _IH_TipTranslation_QB onWriteConnection()
     * @method _IH_TipTranslation_QB newQuery()
     * @method static _IH_TipTranslation_QB on(null|string $connection = null)
     * @method static _IH_TipTranslation_QB query()
     * @method static _IH_TipTranslation_QB with(array|string $relations)
     * @method _IH_TipTranslation_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_TipTranslation_C|TipTranslation[] all()
     * @ownLinks tip_id,\App\Models\Tip,id|language_id,\App\Models\Language,id
     * @mixin _IH_TipTranslation_QB
     */
    class TipTranslation extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string|null $mobile
     * @property Carbon|null $email_verified_at
     * @property string|null $profile
     * @property string|null $type remove in next update
     * @property string $password
     * @property string $fcm_id
     * @property bool $notification
     * @property string|null $firebase_id remove in next update
     * @property string|null $address
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property string|null $country_code
     * @property _IH_Item_C|Item[] $items
     * @property-read int $items_count
     * @method HasMany|_IH_Item_QB items()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property _IH_Permission_C|Permission[] $permissions
     * @property-read int $permissions_count
     * @method MorphToMany|_IH_Permission_QB permissions()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property _IH_Role_C|Role[] $roles
     * @property-read int $roles_count
     * @method MorphToMany|_IH_Role_QB roles()
     * @property _IH_PersonalAccessToken_C|PersonalAccessToken[] $tokens
     * @property-read int $tokens_count
     * @method MorphToMany|_IH_PersonalAccessToken_QB tokens()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @property _IH_UserReports_C|UserReports[] $user_reports
     * @property-read int $user_reports_count
     * @method HasMany|_IH_UserReports_QB user_reports()
     * @method static _IH_User_QB onWriteConnection()
     * @method _IH_User_QB newQuery()
     * @method static _IH_User_QB on(null|string $connection = null)
     * @method static _IH_User_QB query()
     * @method static _IH_User_QB with(array|string $relations)
     * @method _IH_User_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_User_C|User[] all()
     * @foreignLinks id,\App\Models\Item,user_id|id,\App\Models\UserReports,user_id|id,\App\Models\UserPurchasedPackage,user_id|id,\Illuminate\Notifications\DatabaseNotification,user_id|id,\App\Models\Favourite,user_id|id,\App\Models\PaymentTransaction,user_id|id,\App\Models\BlockUser,user_id|id,\App\Models\SocialLogin,user_id
     * @mixin _IH_User_QB
     * @method static UserFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class User extends Model {}

    /**
     * @property int $id
     * @property int $user_id
     * @property int $package_id
     * @property Carbon $start_date
     * @property Carbon|null $end_date
     * @property int|null $total_limit
     * @property int $used_limit
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int|null $payment_transactions_id
     * @property-read string $remaining_days attribute
     * @property-read string $remaining_item_limit attribute
     * @property PaymentTransaction $PaymentTransaction
     * @method BelongsTo|_IH_PaymentTransaction_QB PaymentTransaction()
     * @property Package $package
     * @method BelongsTo|_IH_Package_QB package()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_UserPurchasedPackage_QB onWriteConnection()
     * @method _IH_UserPurchasedPackage_QB newQuery()
     * @method static _IH_UserPurchasedPackage_QB on(null|string $connection = null)
     * @method static _IH_UserPurchasedPackage_QB query()
     * @method static _IH_UserPurchasedPackage_QB with(array|string $relations)
     * @method _IH_UserPurchasedPackage_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_UserPurchasedPackage_C|UserPurchasedPackage[] all()
     * @ownLinks user_id,\App\Models\User,id|package_id,\App\Models\Package,id|payment_transactions_id,\App\Models\PaymentTransaction,id
     * @foreignLinks id,\App\Models\FeaturedItems,user_purchased_package_id
     * @mixin _IH_UserPurchasedPackage_QB
     */
    class UserPurchasedPackage extends Model {}

    /**
     * @property int $id
     * @property int|null $report_reason_id
     * @property int $user_id
     * @property int $item_id
     * @property string|null $other_message
     * @property string $reason
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Item $item
     * @method BelongsTo|_IH_Item_QB item()
     * @property ReportReason|null $report_reason
     * @method BelongsTo|_IH_ReportReason_QB report_reason()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_UserReports_QB onWriteConnection()
     * @method _IH_UserReports_QB newQuery()
     * @method static _IH_UserReports_QB on(null|string $connection = null)
     * @method static _IH_UserReports_QB query()
     * @method static _IH_UserReports_QB with(array|string $relations)
     * @method _IH_UserReports_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_UserReports_C|UserReports[] all()
     * @ownLinks report_reason_id,\App\Models\ReportReason,id|user_id,\App\Models\User,id|item_id,\App\Models\Item,id
     * @mixin _IH_UserReports_QB
     */
    class UserReports extends Model {}
}
