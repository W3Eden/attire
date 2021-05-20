<?php


/**
 *
 * Sanitize Input Data
 */
function attire_sanitize_integer($input)
{
    if (is_numeric($input)) {
        return intval($input);
    }
}

function attire_sanitize_email($input)
{
    if (is_email($input)) {
        return $input;
    }
}

function attire_sanitize_custom_select($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);

    if (strrpos($setting->id, '[')) {
        $id = explode('[', $setting->id);
        $id = explode(']', $id[1]);
        $id = $id[0];

    } else {
        $id = $setting->id;
    }

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.

    foreach ($choices as $choice) {


        if ($choice['value'] === $input) {
            return $input;
        }
    }

    return $setting->default;

}

function attire_sanitize_select($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);
    // Get list of choices from the control associated with the setting.

    if (strrpos($setting->id, '[')) {
        $id = explode('[', $setting->id);
        $id = explode(']', $id[1]);
        $id = $id[0];

    } else {
        $id = $setting->id;
    }

    $choices = $setting->manager->get_control($id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function attire_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

