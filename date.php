<?php
/**
 * View: List View - Single Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @since 4.9.9
 * @since 5.1.1 Move icons into separate templates.
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.1.1
 */
use Tribe__Date_Utils as Dates;

// Check if $event->dates->start is set and not null before calling format()
$event_date_attr = isset($event->dates->start) && !is_null($event->dates->start) ? $event->dates->start->format( Dates::DBDATEFORMAT ) : '';

?>
<div class="tribe-events-calendar-list__event-datetime-wrapper tribe-common-b2">
	<?php $this->template( 'list/event/date/featured' ); ?>
	<time class="tribe-events-calendar-list__event-datetime" id="new-date-start" datetime="<?php echo esc_attr( $event_date_attr ); ?>">
		<?php 
			$schedule_details_value = (string) $event->schedule_details->value();
			$schedule_details_value = str_replace(",", "", $schedule_details_value);

			$pieces = explode(" ", $schedule_details_value);
			if (isset($pieces[0]) && isset($pieces[1]) && isset($pieces[2])) {
			    if (count($pieces) > 14) {
                    	echo $pieces[0] . ' ' . $pieces[1] . ' ' . $pieces[2] . ' ' . ' - ' . ' ' . $pieces[8] . ' ' . $pieces[9] . ' ' . $pieces[10];
                	} elseif (count($pieces) < 12) {
					echo $pieces[0] . ' ' . $pieces[1] . ' ' . $pieces[2];
			    } else {
					echo $pieces[0] . ' ' . $pieces[1] . ' ' . $pieces[2] . ' - ' . ' ' . $pieces[7] . ' ' . $pieces[8] . ' ' . $pieces[9];
				}
			}
		?>
	</time>
	<time class="tribe-events-calendar-list__event-datetime" id="new-time-start" datetime="<?php echo esc_attr( $event_date_attr ); ?>">
		<?php 
			$schedule_details_value = (string) $event->schedule_details->value();
			$pieces = explode(" ", $schedule_details_value);
			if (isset($pieces[0]) && isset($pieces[1]) && isset($pieces[2])) {
			    if (count($pieces) > 14) {
				echo $pieces[5] . ' ' . $pieces[6] . ' - ' . ' ' . $pieces[13] . ' ' . $pieces[14];
				} elseif (count($pieces) < 12) {
					echo $pieces[4] . ' ' . $pieces[5] . ' ' . $pieces[6] . ' ' . $pieces[7] . ' ' . $pieces[8] . ' ' . $pieces[9];
				} else {
				echo $pieces[4] . ' ' . $pieces[5] . ' - ' . ' ' . $pieces[11] . ' ' . $pieces[12];
			    }
			}
		?>
	</time>
	<?php $this->template( 'list/event/date/meta', [ 'event' => $event ] ); ?>
</div>
