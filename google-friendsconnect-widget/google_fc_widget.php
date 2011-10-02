<?php
/*
Plugin Name: Google Members Gadget Widget
Plugin URI: https://github.com/mbijon/wp-google-friendsconnect-widget
Description: This creates a WordPress Widget for Google's 'Members Gadget' from their FriendConnect tools. Add to your site from the <a href="widgets.php">Widgets page</a>. Add the widget to your site, then enter your FriendsConnect Site ID. <strong>To get a FriendConnect ID:</strong> Register at <a href="http://www.google.com/friendconnect/">FriendConnect</a>. After signing up, click 'Plug-ins & APIs' > 'Rest API'. Look for a "Consumer Key" (example, *:01234567890) and copy the numbers that are after the "*:" part.
Version: 1.0.1
Author: Mike Bijon (updated from 'Google Friendsconnect Widget' v1.0 in 2009, Björn Verzijlbergh; Ergensin.nl)
Author URI: http://www.etchsoftware.com
License: GPL2
*/
/*  Copyright 2011 Mike Bijon (email : mike@etchsoftware.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class Google_FC_Widget extends WP_Widget {
	function Google_FC_Widget() {
		$widget_ops = array('classname' => 'Google_FC_Widget', 'description' => __( "Google Members Gadget") );
		$control_ops = array('width' => 340, 'height' => 800);
		$this->WP_Widget('googlefriendsconnect', __('Google Members Gadget'), $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);
		
		// Assign user-values, or set default values
		$title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
		$gfcsiteid = empty($instance['gfcsiteid']) ? '' : $instance['gfcsiteid']; // No default site
		$gfcnumrow = empty($instance['gfcnumrow']) ? '5' : $instance['gfcnumrow'];
		$gfcwidth  = empty($instance['gfcwidth'])  ? '200' : $instance['gfcwidth'];
		$gfccolbor = empty($instance['gfccolbor']) ? '#cccccc' : $instance['gfccolbor'];
		$gfccolbkg = empty($instance['gfccolbkg']) ? '#e0ecff' : $instance['gfccolbkg'];
		$gfccoltxt = empty($instance['gfccoltxt']) ? '#333333' : $instance['gfccoltxt'];
		$gfccollnk = empty($instance['gfccollnk']) ? '#0000cc' : $instance['gfccollnk'];
		$gfccolbka = empty($instance['gfccolbka']) ? '#ffffff' : $instance['gfccolbka'];
		$gfccolcbc = empty($instance['gfccolcbc']) ? '#ffffff' : $instance['gfccolcbc'];
		$gfccolclc = empty($instance['gfccolclc']) ? '#0000cc' : $instance['gfccolclc'];
		$gfccolctc = empty($instance['gfccolctc']) ? '#333333' : $instance['gfccolctc'];
		$gfccolcsl = empty($instance['gfccolcsl']) ? '#7777cc' : $instance['gfccolcsl'];
		$gfccolcst = empty($instance['gfccolcst']) ? '#666666' : $instance['gfccolcst'];
		$gfccolchc = empty($instance['gfccolchc']) ? '#333333' : $instance['gfccolchc'];
		
		echo $before_widget;
		echo $before_title.$title.$after_title;
?>
        <!-- Include the Google Friend Connect javascript library. -->
        <script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
        <!-- Define the div tag where the gadget will be inserted. -->
        <div id="div-<?php echo $gfcsiteid; ?>" style="width:<?php echo $gfcwidth; ?>px;border:1px solid<?php if ( !empty($gfccolbor) ) echo ' ' . $gfccolbor; ?>;" align="center"></div>
        <!-- Render the gadget into a div. -->
        <script type="text/javascript">
        var skin = {};
        skin['BORDER_COLOR'] = '<?php echo $gfccolbor; ?>';
        skin['ENDCAP_BG_COLOR'] = '<?php echo $gfccolbkg; ?>';
        skin['ENDCAP_TEXT_COLOR'] = '<?php echo $gfccoltxt; ?>';
        skin['ENDCAP_LINK_COLOR'] = '<?php echo $gfccollnk; ?>';
        skin['ALTERNATE_BG_COLOR'] = '<?php echo $gfccolbka; ?>';
        skin['CONTENT_BG_COLOR'] = '<?php echo $gfccolcbc; ?>';
        skin['CONTENT_LINK_COLOR'] = '<?php echo $gfccolclc; ?>';
        skin['CONTENT_TEXT_COLOR'] = '<?php echo $gfccolctc; ?>';
        skin['CONTENT_SECONDARY_LINK_COLOR'] = '<?php echo $gfccolcsl; ?>';
        skin['CONTENT_SECONDARY_TEXT_COLOR'] = '<?php echo $gfccolcst; ?>';
        skin['CONTENT_HEADLINE_COLOR'] = '<?php echo $gfccolchc; ?>';
        skin['NUMBER_ROWS'] = '<?php echo $gfcnumrow; ?>';
        google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
        google.friendconnect.container.renderMembersGadget(
         { id: 'div-<?php echo $gfcsiteid; ?>',
           site: '<?php echo $gfcsiteid; ?>' },
          skin);
        </script>
<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['gfcsiteid'] = strip_tags(stripslashes($new_instance['gfcsiteid']));
		$instance['gfcnumrow'] = strip_tags(stripslashes($new_instance['gfcnumrow']));
		$instance['gfcwidth'] = empty($instance['gfcwidth']) ? '200' : strip_tags(stripslashes($new_instance['gfcwidth']));
		$instance['gfccolbor'] = empty($instance['gfccolbor']) ? '#cccccc' : strip_tags(stripslashes($new_instance['gfccolbor']));
		$instance['gfccolbkg'] = empty($instance['gfccolbkg']) ? '#e0ecff' : strip_tags(stripslashes($new_instance['gfccolbkg']));
		$instance['gfccoltxt'] = empty($instance['gfccoltxt']) ? '#333333' : strip_tags(stripslashes($new_instance['gfccoltxt']));
		$instance['gfccollnk'] = empty($instance['gfccollnk']) ? '#0000cc' : strip_tags(stripslashes($new_instance['gfccollnk']));
		$instance['gfccolbka'] = empty($instance['gfccolbka']) ? '#ffffff' : strip_tags(stripslashes($new_instance['gfccolbka']));
		$instance['gfccolcbc'] = empty($instance['gfccolcbc']) ? '#ffffff' : strip_tags(stripslashes($new_instance['gfccolcbc']));
		$instance['gfccolclc'] = empty($instance['gfccolclc']) ? '#0000cc' : strip_tags(stripslashes($new_instance['gfccolclc']));
		$instance['gfccolctc'] = empty($instance['gfccolctc']) ? '#333333' : strip_tags(stripslashes($new_instance['gfccolctc']));
		$instance['gfccolcsl'] = empty($instance['gfccolcsl']) ? '#7777cc' : strip_tags(stripslashes($new_instance['gfccolcsl']));
		$instance['gfccolcst'] = empty($instance['gfccolcst']) ? '#666666' : strip_tags(stripslashes($new_instance['gfccolcst']));
		$instance['gfccolchc ']= empty($instance['gfccolchc']) ? '#333333' : strip_tags(stripslashes($new_instance['gfccolchc']));
		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title'=>'Google FriendsConnect', 'gfcsiteid'=>'0') );
		
		$title = htmlspecialchars($instance['title']);
		$gfcsiteid = htmlspecialchars($instance['gfcsiteid']);
		$gfcnumrow = htmlspecialchars($instance['gfcnumrow']);
		$gfcwidth = empty($instance['gfcwidth']) ? '200' : htmlspecialchars($instance['gfcwidth']);
		$gfccolbor = empty($instance['gfccolbor']) ? '#cccccc' : htmlspecialchars($instance['gfccolbor']);
		$gfccolbkg = empty($instance['gfccolbkg']) ? '#e0ecff' : htmlspecialchars($instance['gfccolbkg']);
		$gfccoltxt = empty($instance['gfccoltxt']) ? '#333333' : htmlspecialchars($instance['gfccoltxt']);
		$gfccollnk = empty($instance['gfccollnk']) ? '#0000cc' : htmlspecialchars($instance['gfccollnk']);
		$gfccolbka = empty($instance['gfccolbka']) ? '#ffffff' : htmlspecialchars($instance['gfccolbka']);
		$gfccolcbc = empty($instance['gfccolcbc']) ? '#ffffff' : htmlspecialchars($instance['gfccolcbc']);
		$gfccolclc = empty($instance['gfccolclc']) ? '#0000cc' : htmlspecialchars($instance['gfccolclc']);
		$gfccolctc = empty($instance['gfccolctc']) ? '#333333' : htmlspecialchars($instance['gfccolctc']);
		$gfccolcsl = empty($instance['gfccolcsl']) ? '#7777cc' : htmlspecialchars($instance['gfccolcsl']);
		$gfccolcst = empty($instance['gfccolcst']) ? '#666666' : htmlspecialchars($instance['gfccolcst']);
		$gfccolchc = empty($instance['gfccolchc']) ? '#333333' : htmlspecialchars($instance['gfccolchc']);
	
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' .     __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfcsiteid') . '">' . __('FriendsConnect ID  (*required):') . ' <input style="width: 160px;" id="' . $this->get_field_id('gfcsiteid') . '" name="' . $this->get_field_name('gfcsiteid') . '" type="text" value="' . $gfcsiteid . '" maxlength="20" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfcnumrow') . '">' . __('Number of Rows       (max: 15):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfcnumrow') . '" name="' . $this->get_field_name('gfcnumrow') . '" type="text" value="' . $gfcnumrow . '" maxlength="2" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfcwidth') . '">' .  __('Width  (200, no &lsquo;px&rsquo;):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfcwidth') . '" name="' . $this->get_field_name('gfcwidth') . '" type="text" value="' . $gfcwidth . '" maxlength="3" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolbor') . '">' . __('Border Color         (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolbor') . '" name="' . $this->get_field_name('gfccolbor') . '" type="text" value="' . $gfccolbor. '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolbkg') . '">' . __('Top/Endcap Color     (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolbkg') . '" name="' . $this->get_field_name('gfccolbkg') . '" type="text" value="' . $gfccolbkg . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccoltxt') . '">' . __('Top Text Color       (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccoltxt') . '" name="' . $this->get_field_name('gfccoltxt') . '" type="text" value="' . $gfccoltxt . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccollnk') . '">' . __('Top Link Color       (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccollnk') . '" name="' . $this->get_field_name('gfccollnk') . '" type="text" value="' . $gfccollnk . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolbka') . '">' . __('Alternate Background (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolbka') . '" name="' . $this->get_field_name('gfccolbka') . '" type="text" value="' . $gfccolbka . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolcsl') . '">' . __('Alternate Link Color (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolcsl') . '" name="' . $this->get_field_name('gfccolcsl') . '" type="text" value="' . $gfccolcsl . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolcst') . '">' . __('Alternate Text Color (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolcst') . '" name="' . $this->get_field_name('gfccolcst') . '" type="text" value="' . $gfccolcst . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolcbc') . '">' . __('Content Background   (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolcbc') . '" name="' . $this->get_field_name('gfccolcbc') . '" type="text" value="' . $gfccolcbc . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolclc') . '">' . __('Content Link Color   (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolclc') . '" name="' . $this->get_field_name('gfccolclc') . '" type="text" value="' . $gfccolclc . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolctc') . '">' . __('Content Text Color   (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolctc') . '" name="' . $this->get_field_name('gfccolctc') . '" type="text" value="' . $gfccolctc . '" maxlength="7" /></label></p>';
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('gfccolchc') . '">' . __('Content Head Color   (#123456):') . ' <input style="width: 80px;" id="' . $this->get_field_id('gfccolchc') . '" name="' . $this->get_field_name('gfccolchc') . '" type="text" value="' . $gfccolchc . '" maxlength="7" /></label></p>';
	}
}

function Google_FC_Widget_init() {
	register_widget('Google_FC_Widget');
}
add_action('widgets_init', 'Google_FC_Widget_init');

?>