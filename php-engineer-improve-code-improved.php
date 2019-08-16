<?php
/**
 * This code retrieves course data from an external API and displays it in the user's
 * My Account area. A merchant has noticed that there's a delay when loading the page.
 * 
 * 1) What changes would you suggest to reduce or remove that delay?
 *  Easy solution: pagination
 *  More complex solution: do api calls asynchronously
 *      The best way to achieve this is by using a third party library like react php
 *      This would require an event loop which is basically a server listening for requrests
 *      it would look something like this
 * 
$loop = React\EventLoop\Factory::create();
       $server = new React\Http\Server(function (Psr\Http\Message\ServerRequestInterface $request) {
           //do everything to get response from api call 
       );
});

$socket = new React\Socket\Server(8080, $loop);
$server->listen($socket);

$loop->run();
 *      
 *  
 * 
 * 2) Is there any other code changes that you would make?
 *  a. get the html out of php logic and into a seperate view
 *  b. better documentation of external dependencies (get_user_meta and magic __ translation function)
 *  c. just a front end thing, but get rid of inline styles
 */
function add_my_courses_section() {
	$api_user_id = get_user_meta( get_current_user_id(), '_external_api_user_id', true );
	if ( ! $api_user_id ) {
		return;
	}
	//$courses  = $this->get_api()->get_courses_assigned_to_user( $api_user_id );
        /* presumably the delay is caused by these api calls.
         * the easy solution (if the delay is caused by a large record set) is pagination
         * is the api supports it, it would look something like this
         */
        
	$sso_link = $this->get_api()->get_sso_link( $api_user_id); //only doing this once, so don't bother with asynchronous (reactphp)
        
	?>
	
	<?php
}
function renderCourses($json_data_from_asynch_request){
    //most of this would be in a view file, just putting it here to keep this all in a single file
    //offset and limit defined and updated in the calling code
    $courses  = $this->get_api()->get_courses_assigned_to_user( $api_user_id, $offset, $limit);  //update this to use reactphp
    ?>
    <h2 style="margin-top: 40px;"><?php echo __( 'My Courses', 'text-domain' ); ?></h2>
	<table>
		<thead><tr>
			<th><?php echo __( 'Course Code', 'text-domain' ); ?></th>
			<th><?php echo __( 'Course Title', 'text-domain' ); ?></th>
			<th><?php echo __( 'Completion', 'text-domain' ); ?></th>
			<th><?php echo __( 'Date Completed', 'text-domain' ); ?></th>
		</tr></thead>
		<tbody>
		<?php
		foreach( $courses as $course ) :
			?><tr>
			<td><?php echo __( $course['Code'] ); ?></td>
			<td><?php echo __( $course['Name'] ); ?></td>
			<td><?php echo __( $course['PercentageComplete'] ); ?> &#37;</td>
			<td><?php echo __( $course['DateCompleted'] ); ?></td>
			</tr>
		<?php endforeach;
		?>
		</tbody>
	</table>
	<p><a href="<?php echo $sso_link ?>" target="_blank" class="button <?php echo $_GET['active_course']; ?>"><?php echo __( 'Course Login', 'text-domain' ); ?></a></p>
        <?php
    
}