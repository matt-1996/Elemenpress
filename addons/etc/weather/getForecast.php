<?php

/* 
weather link: https://www.visualcrossing.com/usage
*/
class getForecast{

       public $result ;
       public $unit;
       public $token;
       
    //    public $city;
    public function __construct(string $city = 'shiraz,iran', $lang='en', $unit='us', $token)  {
        // delete_transient('elementPressWeatherResult');
        // var_dump(get_transient('elementPressWeatherResult'));
    //     $request = wp_remote_get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/losangeles%2CUS/today?lang=fa&unitGroup=us&key=A3GY78PTSBEAEVT2YNRWV6PF4');
    //    $a = json_decode(wp_remote_retrieve_body( $request ));
    //    var_dump($a->currentConditions);
        $this->unit = $unit;
        $this->token = $token;
        // $is_cached = get_transient('elementPressWeatherResult');
        // var_dump($is_cached->currentConditions->sunrise  );
        $a = 1;
        if($a == 1){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/" . rawurlencode($city) . "/today?lang=". $lang ."&unitGroup=" . $unit . "&key=" . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          
          if(json_decode(curl_exec($curl))){

              set_transient('elementPressWeatherResult' , json_decode(curl_exec($curl)), 0);
              $this->result = get_transient('elementPressWeatherResult');
          }
          
          curl_close($curl);
        }

        $this->result = get_transient('elementPressWeatherResult');
    }

    public function isCelcius() : bool {
        // var_dump($this->unit);
        if($this->unit == 'metric'){
            return true;
        }
        return false;
    }

    public function getDegree() : float{
        //var_dump($this->result->currentConditions->temp);
        return $this->result->currentConditions->temp ;
    }

    public function getAddress() : string{
        //var_dump($this->result->currentConditions->temp);
        return ucfirst($this->result->resolvedAddress);
    }

    // public static function getDegreeInCelsius() : Int {

    // }

    public function getLocalTime() : string {
        // var_dump($this->result->currentConditions->temp);
        // return $this->result->currentConditions->temp;
    }

    public function is_day() : bool {

    }

    public function getCondition() : string {
        //var_dump($this->result->currentConditions->conditions);
        return $this->result->currentConditions->conditions;
    }

    public function getWind() : float {
        //var_dump($this->result->currentConditions->windspeed);
        return $this->result->currentConditions->windspeed;
    }

    // public function getWindInKPH() : float {
        
    // }

    public function getHumidity() : float {
        //var_dump($this->result->currentConditions->humidity);
        return $this->result->currentConditions->humidity;
    }

    public function feelsLike() : float {
        //var_dump($this->result->currentConditions->feelslike);
        return $this->result->currentConditions->feelslike;
    }

    // public function feelsLikeInF() : float {
        
    // }

    public function getUVIndex() : float {
        //var_dump($this->result->currentConditions->uvindex);
        return $this->result->currentConditions->uvindex;
    }

    public function getIcon(){
        return $this->result->currentConditions->icon;
    }
    
    public function getSunrise(){
        return $this->result->currentConditions->sunrise;
    }

    public function getSunset(){
        return $this->result->currentConditions->sunset;
    }

    public function sticker(){
        $srcPath = ElEMENTORPRESSURL . 'assets/img/';
        $condition = $this->getIcon();
        switch($condition){
            case 'clear-day' :
                return $srcPath . 'clear-day.png';
                break;
            case 'clear-night':
                return $srcPath . 'clear-night.png';
                break;
            case 'partly-cloudy-night':
                return $srcPath . 'partly-cloudy-night.png';
                break;
            case 'partly-cloudy-day' :
                return $srcPath . 'partly-cloudy-night.png';
                break;
            case 'cloudy' :
                return $srcPath . 'cloudy.png';
                break;
            case 'rain' :
                return $srcPath . 'rain.png';
                break;
            case 'snow' :
                return $srcPath . 'snow.png';
                break;
            default:
                return $srcPath . 'default.png';
                break;
        }
    }
}