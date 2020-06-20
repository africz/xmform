require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'jquery-ui/ui/widgets/datepicker.js';
$.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    buttonImageOnly: true
});
$(".date_picker").datepicker();