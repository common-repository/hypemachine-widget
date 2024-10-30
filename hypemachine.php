<?php

/*

Plugin Name: Widget - HypeMachine

Plugin URI: http://www.fiddelke.org/?p=168

Author: Matt Fiddelke

Author URI: http://fiddelke.org/

Description: This plugin retrieves your list of tracks you 'love' (among other things)on HypeM.com

Version: 0.9



BASED ON DEL.ICIO.US WIDGET BY  http://automattic.com

*/



function widget_HypeM_init() {



        // Check for the required API functions

        if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )

                return;


		function display_tracks($xmlurl, $linkheading, $numberoftracks) {
		
		
				$AgetHeaders = @get_headers($xmlurl);
                if (preg_match("|200|", $AgetHeaders[0])) {
                                $xml = simplexml_load_file($xmlurl);
                                $link =  $xml->channel->link;
                                $description = $xml->channel->description;
                                $tracklink = array ( );
                                $tracktitle = array( );


                                echo "                <li class='widget_hypem-tracks'><a class='hypemwidget' target=_blank href=" . $link . " title=\"" . $description . "\"><b> $linkheading</a></b></li> \n";
                           
                                //Populate TrackInfo array
                                foreach ($xml->channel->item as $item) {
                                        $tracklink[] = $item->link;
                                        $tracktitle[] = $item->title;

                                }

                                $trackinfo = array($tracklink, $tracktitle);
                                For ($displaynum=0; $displaynum<$numberoftracks; $displaynum++){
                                        echo("<a target=\"_blank\" href=\"{$trackinfo[0][$displaynum]}\">{$trackinfo[1][$displaynum]}</a><br>");
                                }
                                
                      }
                      else {
                                echo __('                <li>An error has occured '. $xmlurl . ' is probably down. Or the username is incorrect.</li>', 'widgets');
                      }
                }
		
		
	
		
		
		
        function widget_HypeM_control() {

                

                $options = $newoptions = get_option('widget_HypeMachine');

                

                if ( $_POST['HypeM-submit'] ) {

                        $newoptions['title'] = strip_tags(stripslashes($_POST['HypeM-title']));

                        $newoptions['username'] = strip_tags(stripslashes($_POST['HypeM-username']));

                        $newoptions['numtracks'] = strip_tags(stripslashes($_POST['numtracks']));
                        
                        $newoptions['numfeeds'] = strip_tags(stripslashes($_POST['numfeeds']));
                        
                        $newoptions['numrecenttracks'] = strip_tags(stripslashes($_POST['numrecenttracks']));
                        
                        $newoptions['numpopulartracks'] = strip_tags(stripslashes($_POST['numpopulartracks']));
                        
                        $newoptions['numnowplaying'] = strip_tags(stripslashes($_POST['numnowplaying']));
                        

                }

                

                if ( $options != $newoptions ) {

                        $options = $newoptions;

                        update_option('widget_HypeMachine', $options);

                }

                

                ?>        

                <div style="text-align:left">

                        <label for="HypeM-title" style="line-height:35px;display:block;"><?php _e('Widget Title:', 'widgets'); ?> <input type="text" id="HypeM-title" name="HypeM-title" value="<?php echo wp_specialchars($options['title'], true); ?>" /></label>

                        <label for="HypeM-username" style="line-height:35px;display:block;"><?php _e('HypeM Username:', 'widgets'); ?> <input type="text" id="HypeM-username" name="HypeM-username" value="<?php echo wp_specialchars($options['username'], true); ?>" /></label>

                        <label for="numtracks" style="line-height:35px;display:block;"><?php _e('Display', 'widgets'); ?>
                        <select id="numtracks" name="numtracks">
                                <option value="0" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>0</option>
                                <option value="1" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>1</option>
                                <option value="2" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>2</option>
                                <option value="3" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>3</option>
                                <option value="4" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>4</option>
                                <option value="5" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>5</option>
                                <option value="6" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>6</option>
                                <option value="7" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>7</option>
                                <option value="8" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>8</option>
                                <option value="9" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>9</option>
                                <option value="10" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>10</option>
                                <option value="11" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>11</option>
                                <option value="12" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>12</option>
                                <option value="13" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>13</option>
                                <option value="14" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>14</option>
                                <option value="15" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>15</option>
                                <option value="16" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>16</option>
                                <option value="17" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>17</option>
                                <option value="18" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>18</option>
                                <option value="19" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>19</option>
                                <option value="20" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>20</option>
                                <option value="21" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>21</option>
                                <option value="22" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>22</option>
                                <option value="23" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>23</option>
                                <option value="24" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>24</option>
                                <option value="25" <?php echo $options['numtracks'] == "numtracks" ? "selected=\"selected\"" : ""; ?>>25</option>
                        </select> Loved Tracks</label>

                        <label for="numfeeds" style="line-height:35px;display:block;"><?php _e('Display', 'widgets'); ?>
                        <select id="numfeeds" name="numfeeds">
                                <option value="0" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>0</option>
                                <option value="1" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>1</option>
                                <option value="2" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>2</option>
                                <option value="3" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>3</option>
                                <option value="4" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>4</option>
                                <option value="5" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>5</option>
                                <option value="6" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>6</option>
                                <option value="7" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>7</option>
                                <option value="8" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>8</option>
                                <option value="9" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>9</option>
                                <option value="10" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>10</option>
                                <option value="11" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>11</option>
                                <option value="12" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>12</option>
                                <option value="13" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>13</option>
                                <option value="14" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>14</option>
                                <option value="15" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>15</option>
                                <option value="16" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>16</option>
                                <option value="17" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>17</option>
                                <option value="18" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>18</option>
                                <option value="19" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>19</option>
                                <option value="20" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>20</option>
                                <option value="21" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>21</option>
                                <option value="22" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>22</option>
                                <option value="23" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>23</option>
                                <option value="24" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>24</option>
                                <option value="25" <?php echo $options['numfeeds'] == "numfeeds" ? "selected=\"selected\"" : ""; ?>>25</option>
                        </select> Tracks From Loved Feeds</label>
                        
                        <label for="numrecenttracks" style="line-height:35px;display:block;"><?php _e('Display', 'widgets'); ?>
                        <select id="numrecenttracks" name="numrecenttracks">
                                <option value="0" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>0</option>
                                <option value="1" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>1</option>
                                <option value="2" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>2</option>
                                <option value="3" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>3</option>
                                <option value="4" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>4</option>
                                <option value="5" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>5</option>
                                <option value="6" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>6</option>
                                <option value="7" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>7</option>
                                <option value="8" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>8</option>
                                <option value="9" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>9</option>
                                <option value="10" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>10</option>
                                <option value="11" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>11</option>
                                <option value="12" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>12</option>
                                <option value="13" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>13</option>
                                <option value="14" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>14</option>
                                <option value="15" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>15</option>
                                <option value="16" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>16</option>
                                <option value="17" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>17</option>
                                <option value="18" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>18</option>
                                <option value="19" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>19</option>
                                <option value="20" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>20</option>
                                <option value="21" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>21</option>
                                <option value="22" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>22</option>
                                <option value="23" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>23</option>
                                <option value="24" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>24</option>
                                <option value="25" <?php echo $options['numrecenttracks'] == "numrecenttracks" ? "selected=\"selected\"" : ""; ?>>25</option>
                        </select> Recent Tracks</label>
                        
                        <label for="numpopulartracks" style="line-height:35px;display:block;"><?php _e('Display', 'widgets'); ?>
                        <select id="numpopulartracks" name="numpopulartracks">
                                <option value="0" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>0</option>
                                <option value="1" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>1</option>
                                <option value="2" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>2</option>
                                <option value="3" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>3</option>
                                <option value="4" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>4</option>
                                <option value="5" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>5</option>
                                <option value="6" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>6</option>
                                <option value="7" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>7</option>
                                <option value="8" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>8</option>
                                <option value="9" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>9</option>
                                <option value="10" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>10</option>
                                <option value="11" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>11</option>
                                <option value="12" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>12</option>
                                <option value="13" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>13</option>
                                <option value="14" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>14</option>
                                <option value="15" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>15</option>
                                <option value="16" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>16</option>
                                <option value="17" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>17</option>
                                <option value="18" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>18</option>
                                <option value="19" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>19</option>
                                <option value="20" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>20</option>
                                <option value="21" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>21</option>
                                <option value="22" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>22</option>
                                <option value="23" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>23</option>
                                <option value="24" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>24</option>
                                <option value="25" <?php echo $options['numpopulartracks'] == "numpopulartracks" ? "selected=\"selected\"" : ""; ?>>25</option>
                        </select> Popular Tracks</label>
                        
                        <label for="numnowplaying" style="line-height:35px;display:block;"><?php _e('Display', 'widgets'); ?>
                        <select id="numnowplaying" name="numnowplaying">
                                <option value="0" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>0</option>
                                <option value="1" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>1</option>
                                <option value="2" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>2</option>
                                <option value="3" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>3</option>
                                <option value="4" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>4</option>
                                <option value="5" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>5</option>
                                <option value="6" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>6</option>
                                <option value="7" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>7</option>
                                <option value="8" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>8</option>
                                <option value="9" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>9</option>
                                <option value="10" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>10</option>
                                <option value="11" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>11</option>
                                <option value="12" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>12</option>
                                <option value="13" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>13</option>
                                <option value="14" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>14</option>
                                <option value="15" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>15</option>
                                <option value="16" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>16</option>
                                <option value="17" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>17</option>
                                <option value="18" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>18</option>
                                <option value="19" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>19</option>
                                <option value="20" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>20</option>
                                <option value="21" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>21</option>
                                <option value="22" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>22</option>
                                <option value="23" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>23</option>
                                <option value="24" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>24</option>
                                <option value="25" <?php echo $options['numnowplaying'] == "numnowplaying" ? "selected=\"selected\"" : ""; ?>>25</option>
                        </select> Now Playing Tracks</label>

                        <input type="hidden" name="HypeM-submit" id="HypeM-submit" value="1" />

                </div>                

        <?php

        }

        

        function widget_HypeMachine($args) {

                extract($args);                

                //retrieve options for this widget

                $options = get_option('widget_HypeMachine');

                $title = $options['title'];

                $username = $options['username'];

                $mode = $options['mode'];

                $numtracks = $options['numtracks'];
                
                $numfeeds = $options['numfeeds'];
                
                $numrecenttracks = $options['numrecenttracks'];
                
                $numpopulartracks = $options['numpopulartracks'];
                
                $numnowplayingtracks = $options['numnowplaying'];
                


                $song_separator = ' <br/><i>by</i> ';                



                //hypem feeds
                $HypeMtrackloveurl = "http://HypeM.com/feed/loved/"  .$username . "/1/feed.xml";
                $HypeMfeedloveurl = "http://HypeM.com/feed/lovefeed/" . $username . "/1/feed.xml";
                $HypeMrecenturl = "http://hypem.com/feed/time/today/1/feed.xml";
                $HypeMpopularurl = "http://hypem.com/feed/popular/now/1/feed.xml";
                $HypeMnowplayingurl = "http://hypem.com/feed/time/now/1/feed.xml";



                

                // render widget

                echo "\n\n\n<!-- HypeMachine Widget By Matt Fiddekle - http://www.fiddelke.org --> \n";

                echo $before_widget;

                echo $before_title . "<a target=\"_blank\" href=\"http://hypem.com\"><img src=\"http://www.hypem.com/favicon.ico\" border=\"0\"> " . $title . "</a>" , $after_title;

                echo "\n        <ul class='widget_hypemachine'>\n";

                if ($numtracks > 0){
                        display_tracks($HypeMtrackloveurl,"Loved Tracks",$numtracks);
                }
                
               
               if ($numfeeds > 0){
                       //Get Loved Feeds
                  display_tracks($HypeMfeedloveurl,"Loved Feeds",$numfeeds);     
               }
                
                if ($numrecenttracks > 0){
                        //Get Recent Tracks
                       display_tracks($HypeMrecenturl,"Recent Tracks",$numrecenttracks);
                }
                
                if ($numpopulartracks > 0){
                        //Get Popular Tracks
                        display_tracks($HypeMpopularurl,"Popular Tracks",$numpopulartracks);
                }
                         

                if ($numnowplayingtracks > 0){
                        //Get Now Playing Tracks
                        display_tracks($HypeMnowplayingurl,"Now Playing Tracks",$numnowplayingtracks);
                }
                        


                


                echo "        </ul class='widget_hypemachine'> \n";                


                echo $after_widget;

        }



        register_sidebar_widget(array('HypeM', 'widgets'), 'widget_HypeMachine');

        register_widget_control(array('HypeM', 'widgets'), 'widget_HypeM_control', 280, 280);

}



add_action('widgets_init', 'widget_HypeM_init');

?>
