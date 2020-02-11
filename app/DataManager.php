<?php
namespace App;



class DataManager
{


    public function create_slug($var)
    {
        return str_replace(" ", "-", trim(htmlentities($var)));
    }


    public function getHeader_Descrption($pagetemplate)
    {
        if($pagetemplate=="categories")
        {
            $pageHeader ="Categories";
            $pageDesc = "Find products from one of the many categories we offer";
        }
        else
        if($pagetemplate=="applications")
        {
            $pageHeader ="Applications";
            $pageDesc = "We offer a range of products that are used in a wide array of industrial applications.";
        }
        else
        if($pagetemplate=="brands")
        {
            $pageHeader ="Brands";
            $pageDesc = "We are resellers of the most popular brands across a range of Industrial products";
        }
        return array("pageHeader"=>$pageHeader,"pageDesc"=>$pageDesc);
    }//end of function getHeader_Desc

    public function getData($subdomain)
    {

                $country = "";
                $cities="";
                $currency="";
                $ga='';
                $yandex='';

    switch($subdomain)
        {
            case "ae":
                $country = "UAE";
                $cities = array("Dubai","Abu Dhabi","Sharjah","Ras Al Khaimah","Fujairah","Ajman","Umm Al Quwain");
                $currency="AED";
                $ga='UA-138665419-1';
                $yandex='';
            break;

            case "sa":
                $country = "Saudi arabia";
                $cities = array("Riyadh","Jeddah","Dammam","Al Hufuf","Al Jubayl","Yanbu","Khobar","Jizan");
                $currency="SAR";
                $ga='UA-138665419-2';
                $yandex='';

            break;

            case "az"://Azerbaijan
                $country = "Azerbaijan";
                $cities = array("Baku","Ganja","Sumqayit","Lankaran","Mingachevir","Saatlı","Qaraçuxur","Şirvan","Bakıxanov","Nakhichivan");
                $currency="USD";
                $ga='UA-138665419-3';
                $yandex='5a680029b92a7a72';
            break;

            case "kz"://Kazakhstan
                $country = "Kazakhstan";
                $cities = array("Almaty","Karaganda","Shymkent","Taraz","Nur-Sultan","Pavlodar","Ust-Kamenogorsk","Kyzylorda");
                $currency="USD";
                $ga='UA-138665419-4';
                $yandex='b33280a85e98ac70';
            break;

            case "ng"://Nigera
                $country = "Nigeria";
                $cities = array("Lagos","Kano","Ibadan","Kaduna","Port Harcourt","Benin City","Maiduguri","Jizan");
                $currency="USD";
                $ga='UA-138665419-5';
                $yandex='';
            break;


            case "ru"://Russia
                $country = "Russia";
                $cities = array("Moscow","St. Petersburg","Novosibirsk","Yekateringburg","Nizhny","Novgorod","Samara","Omsk","Kazan");
                $currency="USD";
                 $ga='UA-138665419-6';
                 $yandex='a0367cdacd50107b';
            break;

            case "mn"://Mongolia
                $country = "Mongolia";
                $cities=array("Ulaanbaatar","Erdenet","Darhan","Khovd","Ölgii","Ulaangom","Hovd","Mörön","Hövsgöl","Bayanhongor","Bayanhongor","Arvayheer");
                $currency="USD";
                $ga='UA-138665419-7';
                $yandex='6785ae2d7f69cc1b';
            break;

            case "af"://Afghanistan
                $country = "Afghanistan";
                $cities=array("Kabul","Kandahar","Mazari Sharif","Herat","Jalalabad","Nangarhar","Kunduz","Ghazni","Balkh","Baghlan","Gardez");
                $currency="USD";
                $ga='UA-138665419-8';
                $yandex='';
            break;

            case "pk"://Pakistan
                $country = "Pakistan";
                $cities=array("Karachi","Lahore","Faisalabad","Rawalpindi","Multan","Hyderabad","Gujranwala","Peshawar","Rahim Yar Khan","Quetta");
                $currency="USD";
                $ga='UA-138665419-9';
                $yandex='';
            break;

            case "kg"://Kyrgyzstan
                $country = "Kyrgyzstan";
                $cities=array("Bishkek","Osh","Jalal-Abad","Karakol","Tokmok","Kara-Balta","Naryn","Uzgen","Balykchy","Talas");
                $currency="USD";
                $ga='UA-138665419-10';
                $yandex='b2e63868cbe00388';
            break;

            case "uz"://Uzbekistan
                $country = "Uzbekistan";
                $cities=array("Tashkent","Namangan","Samarkand","Andijan","Bukhara","Nukus","Qarshi","Kokand","Chirchiq","Fergana");
                $currency="USD";
                $ga='UA-138665419-11';
                $yandex='3d131cd395f00476';
            break;

            case "tm"://Turkmenistan
                $country = "Turkmenistan";
                $cities=array("Ashgabat","Turkmenabat","Dashoguz","Mary","Balkanabat","Bayramaly","Türkmenbaşy","Tejen","Abadan","Yolöten");
                $currency="USD";
                $ga='UA-138665419-12';
                $yandex='79fbd3075e338702';
            break;

            case "tj"://Tajikistan
                $country = "Tajikistan";
                $cities=array("Bishkek","Osh","Jalal-Abad","Karakol","Tokmok","Kara-Balta","Naryn","Uzgen","Balykchy","Talas");
                $currency="USD";
                $ga='UA-138665419-13';
                $yandex='693c561bc6c96535';
            break;

			case "eg"://Egypt
                $country = "Egypt";
                $cities = array("Cairo","Alexandria","Giza","Port Said","Suez");
                $currency="USD";
                $ga='UA-138665419-15';
				$yandex='';
            break;

			case "tr"://Turkey
                $country = "Turkey";
                $cities = array("Istanbul","Ankara","Izmir","Bursa","Adana","Gaziantep","Konya","Cankaya","Antalya");
                $currency="USD";
                $ga='UA-138665419-16';
				$yandex='f3b38b24a5ed550b';
            break;

			case "jo"://Jordan
                $country = "Jordan";
                $cities = array("Amman","Zarqa","Irbid","Russeifa");
                $currency="USD";
                $ga='UA-138665419-17';
				$yandex='';
            break;

			case "lb"://Lebanon
                $country = "Lebanon";
                $cities = array("Beirut","Ra's Bayrut","Tripoli","Sidon");
                $currency="USD";
                $ga='UA-138665419-18';
				$yandex='';
            break;


			case "om"://Oman
                $country = "Oman";
                $cities = array("Muscat","Seeb","Salalah","Bawshar","Sohar","As Suwayq","Ibri");
                $currency="USD";
                $ga='UA-138665419-19';
				$yandex='';
            break;

			case "kw"://Kuwait
                $country = "Kuwait";
                $cities = array("Al Ahmadi","Hawalli","As Salimiyah","Sabah as Salim","Al Farwaniyah","Al Fahahil","Kuwait City");
                $currency="USD";
                $ga='UA-138665419-20';
				$yandex='';
            break;

			case "qa"://Qatar
                $country = "Qatar";
                $cities = array("Doha","Ar Rayyan","Umm Salal Muhammad","Al Wakrah","Al Khawr","Ash Shihaniyah","Dukhan","Musay`id");
                $currency="USD";
                $ga='UA-138665419-21';
				$yandex='';
            break;

			case "bh"://Bahrain
                $country = "Bahrain";
                $cities = array("Manama","Al Muharraq","Ar Rifa'","Dar Kulayb","Madinat Hamad","Madinat `Isa","Sitrah");
                $currency="USD";
                $ga='UA-138665419-22';
				$yandex='';
            break;

            case "iq"://Iraq
                $country = "Iraq";
                $cities = array("Baghdad","Basra","Mosul","Erbil","Abu Ghraib","Sulaymaniyah","Kirkuk","Najaf","Karbala","Nasiriyah","Amara","Ad Dīwānīyah");
                $currency="USD";
                $ga='';
                $yandex='';
            break;


            default:
                $country = "";
                $cities = array("USA","Middle East","Asia Pacific");
                $currency="USD";
            break;
        } //end of switch


        return array("country"=>$country,"cities"=>$cities,"currency"=>$currency,"ga"=>$ga,"yandex"=>$yandex);
       }//end of function


       public function getHeader()
       {
            $header="Hello,<br>
    With reference to the email below, please note down the price and other necessary details here as under:";

        return $header;
       }

       public function getHeader_moreinfo()
       {
            $header_moreinfo="Hello Sir,<br>
    With reference to the email below, please advice your company details in order to furnish Quote accordingly. <br> <br> If you need any futher clarifications, please advice.<br> <br> Best Regards, <br>InstrumentsFinder.com<br>
    P.O. Box 122431 | Dubai | United Arab Emirates<br>Email : enquiry@instrumentsfinder.com<br><br>";

        return $header_moreinfo;
       }


       public function getEmailFooter($currency_chosen,$deliveryleadtime,$exworks)

       {




            $footer= '<span style="background:#00ff00">NOTE: Above quoted price includes courier charges upto door till '.$exworks.' local custom duties and taxes covered.</span><p class="MsoNormal"><span style="color:black">If you need any further clarification, please advice.<u></u><u></u></span></p>
<p class="MsoNormal"><b><span style="color:black">TERMS &amp; CONDITIONS</span></b><span style="color:black"><u></u><u></u></span></p>
<ul style="margin:0; margin-left: 25px; padding:0; font-family: Arial, sans-serif; color:#495055; font-size:16px; line-height:22px;" align="left" type="disc">

<li><u>A. Payment Terms</u><br>
  <span class="text-small">All prices are in <b><span style="color:#ff0000;">'.$currency_chosen.'</span></b></span><br>
  <span class="text-small">Material: 100% as advance before material delivery</span>
</li>

<li>B. Delivery<br>
<span class="text-small"> <b><span style="color:#ff0000;">'.$deliveryleadtime.' </span></b>from firm order with advance payment</span>
</li>


<li>C. Validity of Quotation<br>
<span class="text-small">7 Days from quotation date</span>
</li>

<li>D. Pricing<br>
<span class="text-small">Ex-Works <b><span style="color:#ff0000;">'.$exworks.'</b></span></span>
</li>

<li>E. Notes<br>

<span class="text-small">Our above offer is only for supply of above equipment only<br>
Price are only valid for the mentioned quantities in above offer</span>
</li>
</ul>
<span style="background-color: #fdc900;">Our quotation does not include 5% VAT. The same shall be charged as applicable at the time of <br>billing. Our Tax Registration Number (TRN) is 100038007900003.</span><br><br>

<small>
Best regards,<br>
<a href="www.instrumentsfinder.com">InstrumentsFinder.com</a><br>
P.O. Box 122431 | Dubai | United Arab Emirates<br><br>
<a href="mailto:enquiry@instrumentsfinder.com">enquiry@instrumentsfinder.com</a><br>
https://instrumentsfinder.com<br>
<img src="https://instrumentsfinder.com/assets/email_signature.png"><br>
InstrumentsFinder.com :: Committed To Safety For Life!
Leading suppliers For Oilfield Safety And Fire Protection Equipment, Safety & Personal Protection Equipment (PPE), Process Instrumentation, Electrical And Mechanical Machinery Spare Parts, Laboratory Measurement Tools, Surgical / Medical Emergency Products for Oil & Gas Industry in Middle East, Caspian & Africa
</small>';


return $footer;


       }

}//end of class

?>
