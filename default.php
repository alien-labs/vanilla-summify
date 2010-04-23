<?php
/*
Extension Name: Summify
Extension Url: http://github.com/summify/vanilla-summify
Description: Install the Summify link summarization and preview widget. You must configure SummifyClientId in the module's default.php
Version: 1.0
Author: Cristian Strat
Author Url: http://summify.com
*/

// Match this param to the value in your Summify dashboard snippet code.
// Go to http://summify.com/dashboard/ and look at the generated code.
// Example:
//   If your code looks like this
//     <script type="text/javascript" src="http://summify.com/client/v1/2100ad/client.js"></script>
//   Then your SummifyClientId is:
//     2100ad
$Configuration['SummifyClientId'] = 'CHANGE-THIS';

if (isset($Head)) {
  class SummifyWidget extends Control {
    function Render() {
      global $Configuration;
      if ($Configuration['SummifyClientId'] && $Configuration['SummifyClientId'] != 'CHANGE-THIS') {
        $scriptSrc = 'http://summify.com/client/v1/' . $Configuration['SummifyClientId'] . '/client.js';
        echo '<script type="text/javascript" src="', $scriptSrc, '"></script>';
      }
    }
  }
  $AddSummifyWidget = $Context->ObjectFactory->NewContextObject($Context, "SummifyWidget");
  $Page->AddControl("Page_Render", $AddSummifyWidget, $Configuration["CONTROL_POSITION_FOOT"]);
}

?>
