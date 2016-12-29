    <!--Import jQuery before materialize.js-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/mdl.js"></script>
    <script type="text/javascript">
        
// SideNav init
$(".button-collapse").sideNav();

// Custom scrollbar init
var el = document.querySelector('.custom-scrollbar');
Ps.initialize(el);
// Material Select Initialization
 $(document).ready(function() {
    $('.mdb-select').material_select();
  });
$('.mdb-select').material_select('destroy');

// Data Picker Initialization
$('.datepicker').pickadate({
  // Escape any “rule” characters with an exclamation mark (!).
  format: 'yyyy-mm-dd',
})

    </script>