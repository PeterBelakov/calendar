<?php
include "profile_frontend.php";
if(!empty($_POST)){

    #get number of days in selected month
    $daysInMonth = cal_days_in_month(0, $_POST['month'], $_POST['year']);

    #define days of week
    $days = ['Sun','Mon','Tue','Wed','Thu','Fri', 'Sat'];

    #collect all dates for each day of week.
    $collect_days = [];

    echo '<table>';

        #loop all days in the selected month
        for($day = 1 ; $day<=$daysInMonth; $day++){

            #dayIndex is the actual day index of the week
            #(example : 1.1.2017 is  equal to 0 because it is Sunday . Monday is 1, etc.)
            $dayIndex = date( "w", strtotime($day. '.' .$_POST['month'].'.'.$_POST['year'] ));

            #collect all days per day name.
            #Example  for January 2017. Monday values is  array( 1 =>	array(2,9,16,23,30),
            #                            Tuesday values    array( 2 => array(3,	10,	17,	24,	31)
            $collect_days[$dayIndex][] =$day;
            echo '<td>'.$days[$dayIndex]." " . $day  . '</td>';

        }
    echo '</table>';
    echo '<hr>';
    echo '<table>';

    #flag which helps for better formation the first <tr> of the table
    $flag = true;
    foreach ($days as $dayIndex=>$dayName) {
        echo '<tr>';
        echo '<td>'.$dayName. '</td>';

        /*check if the calendar starts with value higher than 1,
        then show a empty td ( <td> </td> )in order to avoid wrong formating */
        if($collect_days[$dayIndex][0] !=1 && $flag ==true ){
            echo  '<td>   </td>';
        }else{

            #if the first day appears then mark flag = TRUE
            $flag = false;
        }

        # foreach days per each day of the week
        foreach ($collect_days[$dayIndex] as $key => $dayNumber) {
                    echo '<td>'.  $dayNumber . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '</br> ';
}

