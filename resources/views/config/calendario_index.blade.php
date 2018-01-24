@extends ('base')

@section ('title', 'Calendario de días inhábiles')

@section ('style') 

<style type ="text/css">
   #cmbYear {margin: 20px auto; width: 150px; text-align: center;}
   #calendar {width: 99%; height: 500px;}
</style>

@endsection 

@section ('script')
<script type ="text/javascript">
$(function(){
       $('#cmbYear').change(function(){
            DisplayCalendar();
       }).trigger('change');
    });
    
    function DisplayCalendar(){
        Loading();
        $.getJSON('{{url('config/calendario/load')}}?year=' + $('#cmbYear').val(), function(json){
              Ready();
              $('#calendar').makeCalendar({
                    date_start: $('#cmbYear').val() + '-01-01', 
                    date_end: $('#cmbYear').val() + '-12-31', 
                    days_selected: json, 
                    fn_select: function(day){
                        $.get('{{url('config/calendario/save')}}?d=' + day, function(data){
                           if(data) Error(data); 
                        });
                    }, 
                    fn_deselect: function(day){
                        $.get('{{url('config/calendario/del')}}?d=' + day, function(data){
                           if(data) Error(data); 
                        });
                    }
              });
        });
    }

</script>
@endsection

@section ('content')
<select class="form-control input-lg" id ="cmbYear">
    <?php for($y=Date('Y')+1; $y>= $min; $y--){?>
    <option value="<?=$y?>" <?=($y==Date('Y')?"selected":"")?>><?=$y?></option>
    <?php }?>
</select>

<div id ="calendar">
    
</div>
@endsection