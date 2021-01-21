<?php
/*
 * Common Helpers
 *
 */
if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== false) {
    $ci = &get_instance();
    $ci->load->helper('url');
    redirect(current_url());
    exit();
}


//generate product url
if (!function_exists('generate_ads_url')) {
    function generate_ads_url($row)
    {
        if (!empty($row)) {
            return base_url() . $row->slug;
        }
    }
}


//date format
if (!function_exists('helper_date_format')) {
    function helper_date_format($datetime)
    {
        $ci   = &get_instance();
        $date = date("M j, Y", strtotime($datetime));
        $date = str_replace("Jan", $ci->lang->line("January"), $date);
        $date = str_replace("Feb", $ci->lang->line("February"), $date);
        $date = str_replace("Mar", $ci->lang->line("March"), $date);
        $date = str_replace("Apr", $ci->lang->line("April"), $date);
        $date = str_replace("May", $ci->lang->line("May"), $date);
        $date = str_replace("Jun", $ci->lang->line("June"), $date);
        $date = str_replace("Jul", $ci->lang->line("July"), $date);
        $date = str_replace("Aug", $ci->lang->line("August"), $date);
        $date = str_replace("Sep", $ci->lang->line("September"), $date);
        $date = str_replace("Oct", $ci->lang->line("October"), $date);
        $date = str_replace("Nov", $ci->lang->line("November"), $date);
        $date = str_replace("Dec", $ci->lang->line("December"), $date);
        return $date;

    }
}

    // -----------------------------------------------------------------------------
    // Get General Setting
    if (!function_exists('get_general_settings')) {
        function get_general_settings()
        {
            $ci =& get_instance();
            $ci->load->model('site_setting_model');
            return $ci->site_setting_model->get_general_settings();
        }
    }

//date format for comments
if (!function_exists('helper_comment_date_format')) {
    function helper_comment_date_format($datetime)
    {
        $ci   = &get_instance();
        $date = date("M j, Y g:i a", strtotime($datetime));
        $date = str_replace("Jan", $ci->lang->line("January"), $date);
        $date = str_replace("Feb", $ci->lang->line("February"), $date);
        $date = str_replace("Mar", $ci->lang->line("March"), $date);
        $date = str_replace("Apr", $ci->lang->line("April"), $date);
        $date = str_replace("May", $ci->lang->line("May"), $date);
        $date = str_replace("Jun", $ci->lang->line("June"), $date);
        $date = str_replace("Jul", $ci->lang->line("July"), $date);
        $date = str_replace("Aug", $ci->lang->line("August"), $date);
        $date = str_replace("Sep", $ci->lang->line("September"), $date);
        $date = str_replace("Oct", $ci->lang->line("October"), $date);
        $date = str_replace("Nov", $ci->lang->line("November"), $date);
        $date = str_replace("Dec", $ci->lang->line("December"), $date);
        return $date;
    }
}

//delete file from server
if (!function_exists('delete_file_from_server')) {
    function delete_file_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 15 && file_exists($full_path)) {
            unlink($full_path);
        }
    }
}

//generate unique id
if (!function_exists('generate_unique_id')) {
    function generate_unique_id()
    {
        $id = uniqid("", true);
        $id = str_replace(".", "-", $id);
        return $id . "-" . rand(10000000, 99999999);
    }
}

//generate slug
if (!function_exists('str_slug')) {
    function str_slug($str)
    {
        return url_title(convert_accented_characters($str), "-", true);
    }
}

// Make Slug Function
if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        $lower_case_string = strtolower($string);
        $string1           = preg_replace('/[^a-zA-Z0-9 ]/s', '', $lower_case_string);
        return strtolower(preg_replace('/\s+/', '-', $string1));
    }
}

//print date
if (!function_exists('formatted_date')) {
    function formatted_date($timestamp)
    {
        return date("Y-m-d / h:i", strtotime($timestamp));
    }
}

//clean number
// if (!function_exists('clean_number')) {
//     function clean_number($num)
//     {
//         $ci  = &get_instance();
//         $num = $ci->security->xss_clean($num);
//         $num = str_slug($num);
//         $num = intval($num);
//         return $num;
//     }
// }

//remove special characters
if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str, $is_slug = false)
    {
        $str = str_replace('#', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        if ($is_slug == true) {
            $str = str_replace(" ", '-', $str);
            $str = str_replace("'", '', $str);
        }
        return $str;
    }
}

//remove forbidden characters
if (!function_exists('remove_forbidden_characters')) {
    function remove_forbidden_characters($str)
    {
        $str = str_replace(';', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        return $str;
    }
}
// -----------------------------------------------------------------------------
function time_ago($timestamp)
{
    if (empty($timestamp)) {
        return "No date provided";
    }
    $periods   = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths   = array("60", "60", "24", "7", "4.35", "12", "10");
    $now       = time();
    $unix_date = strtotime($timestamp);
    // check validity of date
    if (empty($unix_date)) {
        return "";
    }
    // is it future date or past date
    if ($now > $unix_date) {
        $difference = $now - $unix_date;
        $tense      = "ago";
    } else {
        $difference = $unix_date - $now;
        // $tense = "from now";
        $tense = "ago";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {
        $periods[$j] .= "s";
    }

    return "$difference $periods[$j] {$tense}";
}

if (!function_exists('limit_character')) {
    function limit_character($string, $n, $end = '...')
    {
        if (strlen($string) > $n) {
            $string = substr($string, 0, $n) . $end;
        }
        return $string;
    }
}

if (!function_exists('is_user_online')) {
    function is_user_online($timestamp)
    {
        $time_ago        = strtotime($timestamp);
        $current_time    = time();
        $time_difference = $current_time - $time_ago;
        $seconds         = $time_difference;
        $minutes         = round($seconds / 60);
        if ($minutes <= 2) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('convert_to_xml_character')) {
    function convert_to_xml_character($string)
    {
        return str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
    }
}
