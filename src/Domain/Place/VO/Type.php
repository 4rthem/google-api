<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\UnsupportedTypeException;

class Type
{
    const ACCOUNTING = 'accounting';
    const AIRPORT = 'airport';
    const AMUSEMENT_PARK = 'amusement_park';
    const AQUARIUM = 'aquarium';
    const ART_GALLERY = 'art_gallery';
    const ATM = 'atm';
    const BAKERY = 'bakery';
    const BANK = 'bank';
    const BAR = 'bar';
    const BEAUTY_SALON = 'beauty_salon';
    const BICYCLE_STORE = 'bicycle_store';
    const BOOK_STORE = 'book_store';
    const BOWLING_ALLEY = 'bowling_alley';
    const BUS_STATION = 'bus_station';
    const CAFE = 'cafe';
    const CAMPGROUND = 'campground';
    const CAR_DEALER = 'car_dealer';
    const CAR_RENTAL = 'car_rental';
    const CAR_REPAIR = 'car_repair';
    const CAR_WASH = 'car_wash';
    const CASINO = 'casino';
    const CEMETERY = 'cemetery';
    const CHURCH = 'church';
    const CITY_HALL = 'city_hall';
    const CLOTHING_STORE = 'clothing_store';
    const CONVENIENCE_STORE = 'convenience_store';
    const COURTHOUSE = 'courthouse';
    const DENTIST = 'dentist';
    const DEPARTMENT_STORE = 'department_store';
    const DOCTOR = 'doctor';
    const ELECTRICIAN = 'electrician';
    const ELECTRONICS_STORE = 'electronics_store';
    const EMBASSY = 'embassy';
    const ESTABLISHMENT = 'establishment';
    const FINANCE = 'finance';
    const FIRE_STATION = 'fire_station';
    const FLORIST = 'florist';
    const FOOD = 'food';
    const FUNERAL_HOME = 'funeral_home';
    const FURNITURE_STORE = 'furniture_store';
    const GAS_STATION = 'gas_station';
    const GENERAL_CONTRACTOR = 'general_contractor';
    const GROCERY_OR_SUPERMARKET = 'grocery_or_supermarket';
    const GYM = 'gym';
    const HAIR_CARE = 'hair_care';
    const HARDWARE_STORE = 'hardware_store';
    const HEALTH = 'health';
    const HINDU_TEMPLE = 'hindu_temple';
    const HOME_GOODS_STORE = 'home_goods_store';
    const HOSPITAL = 'hospital';
    const INSURANCE_AGENCY = 'insurance_agency';
    const JEWELRY_STORE = 'jewelry_store';
    const LAUNDRY = 'laundry';
    const LAWYER = 'lawyer';
    const LIBRARY = 'library';
    const LIQUOR_STORE = 'liquor_store';
    const LOCAL_GOVERNMENT_OFFICE = 'local_government_office';
    const LOCKSMITH = 'locksmith';
    const LODGING = 'lodging';
    const MEAL_DELIVERY = 'meal_delivery';
    const MEAL_TAKEAWAY = 'meal_takeaway';
    const MOSQUE = 'mosque';
    const MOVIE_RENTAL = 'movie_rental';
    const MOVIE_THEATER = 'movie_theater';
    const MOVING_COMPANY = 'moving_company';
    const MUSEUM = 'museum';
    const NIGHT_CLUB = 'night_club';
    const PAINTER = 'painter';
    const PARK = 'park';
    const PARKING = 'parking';
    const PET_STORE = 'pet_store';
    const PHARMACY = 'pharmacy';
    const PHYSIOTHERAPIST = 'physiotherapist';
    const PLACE_OF_WORSHIP = 'place_of_worship';
    const PLUMBER = 'plumber';
    const POLICE = 'police';
    const POST_OFFICE = 'post_office';
    const REAL_ESTATE_AGENCY = 'real_estate_agency';
    const RESTAURANT = 'restaurant';
    const ROOFING_CONTRACTOR = 'roofing_contractor';
    const RV_PARK = 'rv_park';
    const SCHOOL = 'school';
    const SHOE_STORE = 'shoe_store';
    const SHOPPING_MALL = 'shopping_mall';
    const SPA = 'spa';
    const STADIUM = 'stadium';
    const STORAGE = 'storage';
    const STORE = 'store';
    const SUBWAY_STATION = 'subway_station';
    const SYNAGOGUE = 'synagogue';
    const TAXI_STAND = 'taxi_stand';
    const TRAIN_STATION = 'train_station';
    const TRAVEL_AGENCY = 'travel_agency';
    const UNIVERSITY = 'university';
    const VETERINARY_CARE = 'veterinary_care';
    const ZOO = 'zoo';

    // Others
    const ADMINISTRATIVE_AREA_LEVEL_1 = 'administrative_area_level_1';
    const ADMINISTRATIVE_AREA_LEVEL_2 = 'administrative_area_level_2';
    const ADMINISTRATIVE_AREA_LEVEL_3 = 'administrative_area_level_3';
    const ADMINISTRATIVE_AREA_LEVEL_4 = 'administrative_area_level_4';
    const ADMINISTRATIVE_AREA_LEVEL_5 = 'administrative_area_level_5';
    const COLLOQUIAL_AREA = 'colloquial_area';
    const COUNTRY = 'country';
    const FLOOR = 'floor';
    const GEOCODE = 'geocode';
    const INTERSECTION = 'intersection';
    const LOCALITY = 'locality';
    const NATURAL_FEATURE = 'natural_feature';
    const NEIGHBORHOOD = 'neighborhood';
    const POLITICAL = 'political';
    const POINT_OF_INTEREST = 'point_of_interest';
    const POST_BOX = 'post_box';
    const POSTAL_CODE = 'postal_code';
    const POSTAL_CODE_PREFIX = 'postal_code_prefix';
    const POSTAL_CODE_SUFFIX = 'postal_code_suffix';
    const POSTAL_TOWN = 'postal_town';
    const PREMISE = 'premise';
    const ROOM = 'room';
    const ROUTE = 'route';
    const STREET_ADDRESS = 'street_address';
    const STREET_NUMBER = 'street_number';
    const SUBLOCALITY = 'sublocality';
    const SUBLOCALITY_LEVEL_4 = 'sublocality_level_4';
    const SUBLOCALITY_LEVEL_5 = 'sublocality_level_5';
    const SUBLOCALITY_LEVEL_3 = 'sublocality_level_3';
    const SUBLOCALITY_LEVEL_2 = 'sublocality_level_2';
    const SUBLOCALITY_LEVEL_1 = 'sublocality_level_1';
    const SUBPREMISE = 'subpremise';
    const TRANSIT_STATION = 'transit_station';

    private static $availableTypes = [
        self::ACCOUNTING,
        self::AIRPORT,
        self::AMUSEMENT_PARK,
        self::AQUARIUM,
        self::ART_GALLERY,
        self::ATM,
        self::BAKERY,
        self::BANK,
        self::BAR,
        self::BEAUTY_SALON,
        self::BICYCLE_STORE,
        self::BOOK_STORE,
        self::BOWLING_ALLEY,
        self::BUS_STATION,
        self::CAFE,
        self::CAMPGROUND,
        self::CAR_DEALER,
        self::CAR_RENTAL,
        self::CAR_REPAIR,
        self::CAR_WASH,
        self::CASINO,
        self::CEMETERY,
        self::CHURCH,
        self::CITY_HALL,
        self::CLOTHING_STORE,
        self::CONVENIENCE_STORE,
        self::COURTHOUSE,
        self::DENTIST,
        self::DEPARTMENT_STORE,
        self::DOCTOR,
        self::ELECTRICIAN,
        self::ELECTRONICS_STORE,
        self::EMBASSY,
        self::ESTABLISHMENT,
        self::FINANCE,
        self::FIRE_STATION,
        self::FLORIST,
        self::FOOD,
        self::FUNERAL_HOME,
        self::FURNITURE_STORE,
        self::GAS_STATION,
        self::GENERAL_CONTRACTOR,
        self::GROCERY_OR_SUPERMARKET,
        self::GYM,
        self::HAIR_CARE,
        self::HARDWARE_STORE,
        self::HEALTH,
        self::HINDU_TEMPLE,
        self::HOME_GOODS_STORE,
        self::HOSPITAL,
        self::INSURANCE_AGENCY,
        self::JEWELRY_STORE,
        self::LAUNDRY,
        self::LAWYER,
        self::LIBRARY,
        self::LIQUOR_STORE,
        self::LOCAL_GOVERNMENT_OFFICE,
        self::LOCKSMITH,
        self::LODGING,
        self::MEAL_DELIVERY,
        self::MEAL_TAKEAWAY,
        self::MOSQUE,
        self::MOVIE_RENTAL,
        self::MOVIE_THEATER,
        self::MOVING_COMPANY,
        self::MUSEUM,
        self::NIGHT_CLUB,
        self::PAINTER,
        self::PARK,
        self::PARKING,
        self::PET_STORE,
        self::PHARMACY,
        self::PHYSIOTHERAPIST,
        self::PLACE_OF_WORSHIP,
        self::PLUMBER,
        self::POLICE,
        self::POST_OFFICE,
        self::REAL_ESTATE_AGENCY,
        self::RESTAURANT,
        self::ROOFING_CONTRACTOR,
        self::RV_PARK,
        self::SCHOOL,
        self::SHOE_STORE,
        self::SHOPPING_MALL,
        self::SPA,
        self::STADIUM,
        self::STORAGE,
        self::STORE,
        self::SUBWAY_STATION,
        self::SYNAGOGUE,
        self::TAXI_STAND,
        self::TRAIN_STATION,
        self::TRAVEL_AGENCY,
        self::UNIVERSITY,
        self::VETERINARY_CARE,
        self::ZOO,
        // Others
        self::ADMINISTRATIVE_AREA_LEVEL_1,
        self::ADMINISTRATIVE_AREA_LEVEL_2,
        self::ADMINISTRATIVE_AREA_LEVEL_3,
        self::ADMINISTRATIVE_AREA_LEVEL_4,
        self::ADMINISTRATIVE_AREA_LEVEL_5,
        self::COLLOQUIAL_AREA,
        self::COUNTRY,
        self::FLOOR,
        self::GEOCODE,
        self::INTERSECTION,
        self::LOCALITY,
        self::NATURAL_FEATURE,
        self::NEIGHBORHOOD,
        self::POLITICAL,
        self::POINT_OF_INTEREST,
        self::POST_BOX,
        self::POSTAL_CODE,
        self::POSTAL_CODE_PREFIX,
        self::POSTAL_CODE_SUFFIX,
        self::POSTAL_TOWN,
        self::PREMISE,
        self::ROOM,
        self::ROUTE,
        self::STREET_ADDRESS,
        self::STREET_NUMBER,
        self::SUBLOCALITY,
        self::SUBLOCALITY_LEVEL_4,
        self::SUBLOCALITY_LEVEL_5,
        self::SUBLOCALITY_LEVEL_3,
        self::SUBLOCALITY_LEVEL_2,
        self::SUBLOCALITY_LEVEL_1,
        self::SUBPREMISE,
        self::TRANSIT_STATION,
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public static function getAvailableTypes()
    {
        return self::$availableTypes;
    }
}
