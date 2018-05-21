<?php
/**
 * Display for Event Custom Post Types
 */
global $post, $ecwd_options;
$post_id = $post->ID;
$meta = get_post_meta($post_id);

// Load up all post meta data

$ecwd_event_date_from = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_date_from', true);
$ecwd_event_date_to = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_date_to', true);
$ecwd_event_url = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_url', true);
$ecwd_event_repeat_event = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_event', true);
$ecwd_event_repeat_how = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_how', true);
$ecwd_event_repeat_repeat_until = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_repeat_until', true);
$ecwd_all_day_event = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_all_day_event', true);
$ecwd_event_day = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_day', true);
if (!is_array($ecwd_event_day)) {
  $ecwd_event_day = array();
}

$ecwd_event_repeat_month_on_days = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_month_on_days', true);
if (!$ecwd_event_repeat_month_on_days) {
  $ecwd_event_repeat_month_on_days = 1;
}
$ecwd_event_repeat_year_on_days = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_year_on_days', true);

if (!$ecwd_event_repeat_year_on_days) {
  $ecwd_event_repeat_year_on_days = 1;
}
$ecwd_event_repeat_on_the_m = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_on_the_m', true);
$ecwd_event_repeat_on_the_y = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_repeat_on_the_y', true);


$ecwd_monthly_list_monthly = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_monthly_list_monthly', true);
$ecwd_monthly_week_monthly = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_monthly_week_monthly', true);

$ecwd_monthly_list_yearly = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_monthly_list_yearly', true);
$ecwd_monthly_week_yearly = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_monthly_week_yearly', true);
$ecwd_event_year_month = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_year_month', true);
$ecwd_event_video = get_post_meta($post->ID, ECWD_PLUGIN_PREFIX . '_event_video', true);
?>


<table class="form-table">
  <tr id="ecwd_event_dates">
    <th scope="row"><?php _e('Event Dates', 'event-calendar-wd'); ?></th>
    <td>
      <?php _e('From', 'event-calendar-wd'); ?>
      <input type="text" name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date_from"
             id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date_from"
             class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date"
             value="<?php echo $ecwd_event_date_from; ?>"/>
      <!-- <p class="description">
       </p>-->
      <?php _e('To', 'event-calendar-wd'); ?>
      <input type="text" name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date_to"
             id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date_to"
             class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_date"
             value="<?php echo $ecwd_event_date_to; ?>"/>

      <!--            <div id="-->
      <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_pickup_date" class="button" value="">Days</div>-->
      <!--            <div id="-->
      <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_pickup_time" class="button" value="">Time</div>-->
      <div class="checkbox-div">
        <input type='checkbox' class='ecwd_all_day_event' id='ecwd_all_day_event'
               name='ecwd_all_day_event' value="1" <?php checked($ecwd_all_day_event, '1'); ?>/>
        <label for="ecwd_all_day_event"></label>
      </div>
      <label for="ecwd_all_day_event"><?php _e('All day', 'event-calendar-wd'); ?></label>
      <!--<p class="description">
      </p>-->


      <p class="description ecwd_all_day_event_description">
        <?php _e('Fill in the starting and ending dates and time of the event. If the event lasts entire day, check the box on the right.', 'event-calendar-wd'); ?>
      </p>

    </td>
  </tr>
  <?php if ($is_ !== false) { ?>
    <tr id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeats_div">
      <th scope="row"><label class="repeat_format"><?php _e('Repeat rate', 'event-calendar-wd'); ?></label></th>
      <td>
        <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_repeat">
          <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_repeat_type_list">
            <!-- dont repeat -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <p>
                <label>
                  <input checked='checked'
                         id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_dont_repeat_radio"
                         class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_radio"
                         type="radio"
                         name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event"
                         value="no_repeat" <?php checked($ecwd_event_repeat_event, 'no_repeat') ?>/>
                  <?php _e('Don\'t repeat', 'event-calendar-wd'); ?>
                </label>
              </p>
            </div>
            <!-- daily -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <label>
                <input class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_radio" type="radio"
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event"
                       value="daily" <?php checked($ecwd_event_repeat_event, 'daily') ?>/>
                <?php _e('Daily', 'event-calendar-wd'); ?>
              </label>


            </div>

            <!-- weekly -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <label>
                <input class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_radio" type="radio"
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event"
                       value="weekly" <?php checked($ecwd_event_repeat_event, 'weekly') ?>/>
                <?php _e('Weekly', 'event-calendar-wd'); ?>
              </label>

              <p class="description">

              </p>
            </div>

            <!-- monthly -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <label>
                <input class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_radio"
                       id="<?php echo ECWD_PLUGIN_PREFIX; ?>_repeat_event_monthly" type="radio"
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event"
                       value="monthly" <?php checked($ecwd_event_repeat_event, 'monthly') ?> />
                <?php _e('Monthly', 'event-calendar-wd'); ?>
              </label>

              <p class="description"></p>


            </div>
            <!-- yearly -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <label>
                <input class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_radio" type="radio"
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event"
                       value="yearly" <?php checked($ecwd_event_repeat_event, 'yearly') ?>/>
                <?php _e('Yearly', 'event-calendar-wd'); ?>
              </label>
            </div>
          </div>
          <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_repeat_advanced ">
            <div id="ecwd_daily" class="hidden">
              <label class="repeat_format"><?php _e('Repeat every', 'event-calendar-wd'); ?></label>
              <input type="text" name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how"
                     value="<?php echo $ecwd_event_repeat_how ?>"/>

                        <span id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label_daily"
                              class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label hidden">
                            <?php _e('day(s)', 'event-calendar-wd'); ?>
                        </span>    

                        <span id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label_weekly"
                              class=" <?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label hidden">
                            <?php _e('weeks(s)', 'event-calendar-wd'); ?>
                          <?php _e('on ', 'event-calendar-wd'); ?>:
                        </span>
                        <span id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label_monthly"
                              class=" <?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label hidden">
                            <?php _e('month(s)', 'event-calendar-wd'); ?>
                        </span>
                        <span id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label_yearly"
                              class=" <?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_how_label hidden">
                            <?php _e('year(s) in ', 'event-calendar-wd'); ?>
                        </span>
            </div>

            <div id="ecwd_weekly" class="hidden">
              <div id="<?php echo ECWD_PLUGIN_PREFIX; ?>_choose_day_container">
                <div>
                  <!-- each day is a field -->
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_monday"
                           value='monday' <?php if (in_array('monday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_monday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_monday"><?php _e('Monday', 'event-calendar-wd'); ?></label>
                </div>
                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_tuesday"
                           value='tuesday' <?php if (in_array('tuesday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_tuesday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_tuesday"><?php _e('Tuesday', 'event-calendar-wd'); ?></label>
                </div>

                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_wednesday"
                           value='wednesday' <?php if (in_array('wednesday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_wednesday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_wednesday"><?php _e('Wednesday', 'event-calendar-wd'); ?></label>
                </div>
                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_thursday"
                           value='thursday' <?php if (in_array('thursday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_thursday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_thursday"><?php _e('Thursday', 'event-calendar-wd'); ?></label>
                </div>
                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_friday"
                           value='friday' <?php if (in_array('friday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_friday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_friday"><?php _e('Friday', 'event-calendar-wd'); ?></label>
                </div>
                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_saturday"
                           value='saturday' <?php if (in_array('saturday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_saturday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_saturday"><?php _e('Saturday', 'event-calendar-wd'); ?></label>
                </div>
                <div>
                  <div class="checkbox-div">
                    <input type='checkbox' name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_day[]"
                           id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_sunday"
                           value='sunday' <?php if (in_array('sunday', $ecwd_event_day)) {
                      echo 'checked="checked"';
                    } ?> />
                    <label for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_sunday"></label>
                  </div>
                  <label
                    for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_sunday"><?php _e('Sunday', 'event-calendar-wd'); ?></label>
                </div>
              </div>
            </div>
            <div id="ecwd_monthly" class="hidden">
              <div>


                <input type='radio' value="1" <?php checked($ecwd_event_repeat_month_on_days, '1') ?>
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days"
                       id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days_1"
                       class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_choose"/>
                <label class="repeat_format_monthly"
                       for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days_1"><?php _e('On the same day', 'event-calendar-wd'); ?></label>
                <!--                            <input type="text" name="-->
                <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_repeat_on_the_m"-->
                <!--                                   class='-->
                <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_repeat_on_the'-->
                <!--                                   value="-->
                <?php //echo $ecwd_event_repeat_on_the_m; ?><!--"/>-->
              </div>

              <div class="ecwd_event_repeat_event_div">

                <input type='radio' value="2" <?php checked($ecwd_event_repeat_month_on_days, '2') ?>
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days"
                       id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days_2"
                       class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_list_radio"/>

                <label class="repeat_format_monthly"
                       for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_month_on_days_2"><?php _e('On the: ', 'event-calendar-wd'); ?></label>
                <select name="<?php echo ECWD_PLUGIN_PREFIX; ?>_monthly_list_monthly"
                        class="select_to_enable_disable">
                  <option <?php selected($ecwd_monthly_list_monthly, 'first'); ?>
                    value="first"><?php _e('First', 'event-calendar-wd'); ?> </option>
                  <option <?php selected($ecwd_monthly_list_monthly, 'second'); ?>
                    value="second"><?php _e('Second', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_monthly, 'third'); ?>
                    value="third"><?php _e('Third', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_monthly, 'fourth'); ?>
                    value="fourth"><?php _e('Fourth', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_monthly, 'last'); ?>
                    value="last"><?php _e('Last', 'event-calendar-wd'); ?></option>
                </select>
                <select name="<?php echo ECWD_PLUGIN_PREFIX; ?>_monthly_week_monthly"
                        class="select_to_enable_disable">
                  <option <?php selected($ecwd_monthly_week_monthly, 'monday'); ?>
                    value="monday"><?php _e('Monday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'tuesday'); ?>
                    value="tuesday"><?php _e('Tuesday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'wednesday'); ?>
                    value="wednesday"><?php _e('Wednesday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'thursday'); ?>
                    value="thursday"><?php _e('Thursday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'friday'); ?>
                    value="friday"><?php _e('Friday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'saturday'); ?>
                    value="saturday"><?php _e('Saturday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_monthly, 'sunday'); ?>
                    value="sunday"><?php _e('Sunday', 'event-calendar-wd'); ?></option>
                </select>
              </div>
            </div>
            <div id="ecwd_yearly" class="hidden">
              <select name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_year_month"
                      id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_year_month" disabled="disabled"
                      class="select_to_enable_disable">
                <option <?php selected($ecwd_event_year_month, '1'); ?>
                  value="1"><?php _e('January', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '2'); ?>
                  value="2"><?php _e('February', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '3'); ?>
                  value="3"><?php _e('March', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '4'); ?>
                  value="4"><?php _e('April', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '5'); ?>
                  value="5"><?php _e('May', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '6'); ?>
                  value="6"><?php _e('June', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '7'); ?>
                  value="7"><?php _e('July', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '8'); ?>
                  value="8"><?php _e('August', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '9'); ?>
                  value="9"><?php _e('September', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '10'); ?>
                  value="10"><?php _e('October', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '11'); ?>
                  value="11"><?php _e('November', 'event-calendar-wd'); ?></option>
                <option <?php selected($ecwd_event_year_month, '12'); ?>
                  value="12"><?php _e('December', 'event-calendar-wd'); ?></option>
              </select>

              <div class="ecwd_event_repeat_event_div">
                <input type='radio' value="1" <?php checked($ecwd_event_repeat_year_on_days, '1') ?>
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days"
                       id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days_1"
                       class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_choose"/>
                <label class="repeat_format_monthly"
                       for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days_1"><?php _e('On the same day', 'event-calendar-wd'); ?>
                  :</label>
                <!--                            <input type="text" name="-->
                <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_repeat_on_the_m"-->
                <!--                                   class='-->
                <?php //echo ECWD_PLUGIN_PREFIX; ?><!--_event_repeat_on_the'-->
                <!--                                   value="-->
                <?php //echo $ecwd_event_repeat_on_the_m; ?><!--"/>-->
              </div>

              <div class="ecwd_event_repeat_event_div">
                <input type='radio' value="2" <?php checked($ecwd_event_repeat_year_on_days, '2') ?>
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days"
                       id="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days_2"
                       class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_list_radio"/>

                <label class="repeat_format_monthly"
                       for="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_year_on_days_2"><?php _e('On the: ', 'event-calendar-wd'); ?></label>
                <select name="<?php echo ECWD_PLUGIN_PREFIX; ?>_monthly_list_yearly"
                        class="select_to_enable_disable">
                  <option <?php selected($ecwd_monthly_list_yearly, 'first'); ?>
                    value="first"> <?php _e('First', 'event-calendar-wd'); ?> </option>
                  <option <?php selected($ecwd_monthly_list_yearly, 'second'); ?>
                    value="second"><?php _e('Second', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_yearly, 'third'); ?>
                    value="third"><?php _e('Third', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_yearly, 'fourth'); ?>
                    value="fourth"><?php _e('Fourth', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_list_yearly, 'last'); ?>
                    value="last"><?php _e('Last', 'event-calendar-wd'); ?></option>
                </select>
                <select name="<?php echo ECWD_PLUGIN_PREFIX; ?>_monthly_week_yearly"
                        class="select_to_enable_disable">
                  <option <?php selected($ecwd_monthly_week_yearly, 'monday'); ?>
                    value="monday"><?php _e('Monday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'tuesday'); ?>
                    value="tuesday"><?php _e('Tuesday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'wednesday'); ?>
                    value="wednesday"><?php _e('Wednesday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'thursday'); ?>
                    value="thursday"><?php _e('Thursday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'friday'); ?>
                    value="friday"><?php _e('Friday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'saturday'); ?>
                    value="saturday"><?php _e('Saturday', 'event-calendar-wd'); ?></option>
                  <option <?php selected($ecwd_monthly_week_yearly, 'sunday'); ?>
                    value="sunday"><?php _e('Sunday', 'event-calendar-wd'); ?></option>
                </select>
              </div>

            </div>
            <!-- repeat until -->
            <div class="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_event_div">
              <p class="description">

              <div id="ecwd_repeat_until" class="hidden">
                <label class="repeat_format"><?php _e('Repeat until', 'event-calendar-wd'); ?></label>
                <input id='<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_until_input' type="text"
                       name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_repeat_repeat_until"
                       value="<?php echo $ecwd_event_repeat_repeat_until; ?>"/>
              </div>
              </p>
            </div>

          </div>
          <div class="clear"></div>
        </div>
        <p class="description">
          <?php _e('Specify the repeating rate of the event.', 'event-calendar-wd'); ?>
        </p>
      </td>
    </tr>


  <?php } else { ?>
    <tr>
      <th scope="row"><label class="repeat_format"><?php _e('Repeat rate', 'event-calendar-wd'); ?></label></th>
      <td>
        <a href="https://web-dorado.com/files/fromEventCalendarWD.php"
           target="_blank"><?php _e('Upgrade to Premium version', 'event-calendar-wd'); ?></a>
      </td>
    </tr>
  <?php } ?>

  
  <tr>
    <th scope="row"><?php _e('Event URL', 'event-calendar-wd'); ?></th>
    <td>
      <input type="text" name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_url" value="<?php echo $ecwd_event_url; ?>"
             size="70">

      <p class="description">
        <?php _e('Provide a custom URL which will display event details.', 'event-calendar-wd'); ?>
      </p>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Event Video URL', 'event-calendar-wd'); ?></th>
    <td>
      <input type="text" name="<?php echo ECWD_PLUGIN_PREFIX; ?>_event_video"
             value="<?php echo $ecwd_event_video; ?>" size="70">

      <p class="description">
        <?php _e('Provide Youtube or Vimeo URL of the video to accompany the event.', 'event-calendar-wd'); ?>
      </p>
    </td>
  </tr>
</table>