<?php  


//======================================
//Update settings -> Add tab
//======================================

if( $_POST[ 'add_tab' ] == 'Y' ) 
{
    //Update the option
    add_option( 'mlft_added', 'YES' );
    if (isset($_POST[ 'formId' ]))
        $formId =  $_POST[ 'formId' ];
    else 
        $formId =  $_POST[ 'formId_end' ];
    $the_code_to_insert="<script type=\"text/javascript\"> var _ohtConfig = { debug : true, v : 0.1, mscp : ('https:' == document.location.protocol ? 'https://' : 'http://') + 'owsassets.onehourtranslation.com/build/0.1', services:{ mlft : { formid : ".$formId.", src : 'http://www.onehourtranslation.com' } } }; (function() { var oscr = document.createElement('script'); oscr.type = 'text/javascript'; oscr.async = true; oscr.src = _ohtConfig.mscp+'/all.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(oscr, s); })(); </script> <a href=\"http://www.onehourtranslation.com/\" class=\"oht_ref\">Translation Services</a>";    
    add_option( 'mlft_code', $the_code_to_insert );   
}


//======================================
//Update settings -> Remove tab
//======================================
if( $_POST[ 'remove_tab' ] == 'Y' ) 
{
    //Remove the tab from wordpress footer
    delete_option('mlft_code');
    //Update the option
    delete_option('mlft_added');
}

//======================================
//Plugin activated but tab not added yet
//======================================
if (get_option('mlft_added')=="")
{
?>    
<div class="wrap" style="margin-top:30px;">			
    <h2 style="margin-bottom: 25px;">Multi-Lingual Feedback Tab (MLFT)</h2>
    Multi-Lingual Feedback Tab (MLFT) is a Free fully functional and easy to customize feedback tab by One Hour Translation.<br />
    MLFT allows any site owner to add multi-lingual feedback tab to any page in a simple and easy way.<br />
    <br />
    
    <form name="mlft_form" id="mlft_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">				

    <input type="hidden" name="add_tab" value="Y">
    FormId:<input type="text" name="formId" id="formId" value="">
    <input type="submit" name="submit_but" id="submit_but" value="Add the tab" />
    <br /> 
        
    <strong>Main Features:</strong>
    <br />
    <ul>
        <li>Add multi-lingual feedback to any web-page easily</li>
        <li>Free of charge</li>
        <li>Multi Lingual - users can see the tab and provide the feedback in their language</li>
        <li>Dynamic language selection - controlled by the admin</li>
        <li>Users Feedback is sent by email and is also available online</li>
        <li>Feedback is machine translated with Google and can be human translated by One Hour Translation.</li>
        <li>Fields selection - admin has full control over the tab look and feel</li>
        <li>Tab skins - Admin can fully customize the tab with any background you like</li>
        <li>Generate as many tabs as you like</li>
        <li>Complete Feedback management system</li>
    </ul>
    <br />
    <strong>To use the Multi Lingual Feedback Tab:</strong>
    <ul>
        <li>Download, install and activate the Plugin</li>
        <li>Register to <a href="http://www.onehourtranslation.com/" target="_blank">One Hour Translation</a> (free) to open an account. The account will be used to manage the tab/s.</li>
        <li>Goto <a href="https://www.onehourtranslation.com/mlf/myForms" target="_blank">https://www.onehourtranslation.com/mlf/myForms</a></li>
        <li>Click "Create New Tab"</li>
        <li>Enter Tab details and click Save.</li>
        <li>Copy the Formid from the tab "Get Code" section.</li>
        <li>Paste the Formid to the configuration section on the Plugin and click "save configuration"</li>
        <li>The feedback tab will be displayed on your website and you will receive the feedback in the language of your choice</li>    
    </ul>
    <br />
    FormId:<input type="text" name="formId_end" id="formId_end" value="">
    <input type="submit" name="submit_but_end" id="submit_but" value="Add the tab" />
    
    </form>
</div>

<?php
}
//======================================
//Tab added to footer
//======================================
if (get_option('mlft_added')=="YES")
{   
?>
<div class="wrap" style="margin-top:30px;">	
    <h2 style="margin-bottom: 25px;">Multi-Lingual Feedback Tab (MLFT)</h2>		
    Multi-Lingual Feedback Tab (MLFT) is a Free fully functional and easy to customize feedback tab by One Hour Translation.<br />
    MLFT allows any site owner to add multi-lingual feedback tab to any page in a simple and easy way.<br />
    <br />
    <strong>The MLFT was added to your website, to remove it click on the button</strong>
    <br /><br />
    <form name="videomat_form" id="videomat_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">				
        <input type="hidden" name="remove_tab" value="Y">
        <input type="submit" name="submit_but" id="submit_but" value="Remove the tab" />
    </form>
</div>
<?php    
}
?>    


