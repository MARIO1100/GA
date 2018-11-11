
new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    
   
		
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    
  
    data: [
  
      {x: '2013-03-30 01:00:00', y: 150, },
        {x: '2013-03-30 02:00:00', y: 70 },
        {x: '2013-03-30 03:00:00', y: 93 },
        {x: '2013-03-30 04:00:00', y: 30 },
          {x: '2013-03-30 05:00:00', y: 85 },
            {x: '2013-03-30 06:00:00', y: 120 },
              {x: '2013-03-30 07:00:00', y: 98 },
                {x: '2013-03-30 08:00:00', y: 52 },
                  {x: '2013-03-30 09:00:00', y: 135},
                    {x: '2013-03-30 10:00:00', y: 140 },
                      {x: '2013-03-30 11:00:00', y: 148 },
                        {x: '2013-03-30 12:00:00', y: 60 },
  
      ],
  
    // The name of the data record attribute that contains x-values.
    xkey: 'x',
  ykeys: ['y' ],
  labels: ['Km/h', ],
  
    resize: true,
    lineColors:['#9C2478']
  
  });
  
  var days = 'Days';
  var value = 'value';

  var day_data = [  
    {days :  "Lunes",        value: 10},
    {days :  "Martes",       value: 24},
    {days :  "Miercoles",    value: 35},
    {days :  "Jueves",       value: 35},
    {days :  "VIernes",      value: 21},
    {days :  "Sabado",       value: 19},
    {days :  "Domingo",      value: 10},
  ];
  Morris.Line({
    element: 'myfirstchart2',
    data: day_data,
    xkey: days,
    ykeys: [value],
    labels: ['Shocks'],
  
    parseTime: false,
    resize: true,
    lineColors:['#17871C']
  });
  
  <div class="row">
			 <p class="text-center" style="font-size:30px;">Hours</p>
       
		</div>
  
  
  $("#botData").on("click",function(){
    console.log("Click");
  });
  