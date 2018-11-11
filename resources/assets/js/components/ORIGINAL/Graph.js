import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import 'morris.js/morris.js';
//import 'morris.css/morris.css';
//import './morris.css';

var height = {
    height: '250px'
};

export default class Graph extends Component{
    componentDidMount(){
        axios.get('/api/dash').then(response => {
            let data = response.data;
            
            let perDay =data.PerDay;
            let perHour = data.PerHour;

            console.log('Delayed');

            var hour_data = [
                {}, {}, {}, {}, {}, {}, {}, {}, 
                {}, {}, {}, {}, {}, {}, {}, {}, 
                {}, {}, {}, {}, {}, {}, {}, {}
            ];

            for(var i = 0; i < 24; i++){
                hour_data[i]['x'] = perHour[i].hour;
                hour_data[i]['y'] = perHour[i].qty;
            }
    
            Morris.Line({
                element: 'perHour',
                data: hour_data,

                xkey: ['x'],
                ykeys: ['y'],
                labels: ['Shocks'],
                parseTime: false,
                resize: true,
                lineColors:['#9C2478']            
            });
            

            var days = 'Days';
            var value = 'value';

            var day_data = [{}, {}, {}, {}, {}, {}, {}];
            
            var sorter = {
                "sunday": 0, // << if sunday is first day of week
                "monday": 1,
                "tuesday": 2,
                "wednesday": 3,
                "thursday": 4,
                "friday": 5,
                "saturday": 6,
            }
              
            perDay.sort(function sortByDay(a, b) {
                var day1 = a.day.toLowerCase();
                var day2 = b.day.toLowerCase();
                return sorter[day1] > sorter[day2];
            });
              
              console.log(perHour);

            for(var i = 0; i < 7; i++){
                day_data[i][days] = perDay[i].day;
                day_data[i][value] = perDay[i].qty;
            }
            
            Morris.Line({
                element: 'perDay',
                data: day_data,
                xkey: days,
                ykeys: [value],
                labels: ['Shocks'],
                
                parseTime: false,
                resize: true,
                lineColors:['#17871C']
            });
            
            $("#botData").on("click",function(){
                console.log("Click");
            });
        }).catch(error =>{
            console.log(error);
        });
        
    }
    
    render(){ 
        return(
            <div>
                <h1></h1>

                <div className="row">
                    <div className="col-md-12">
                        <h2>Record of shock per hours</h2>
                        <div id="perHour" style={height}></div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-12">
                        <h2>Record of shock per days</h2>
						
                        <div id="perDay" style={height}></div>
                    </div>
                </div>
                <button type="button" id="botData" className="btn btn-primary">Load Data</button>
            </div>
        );
    }
}
<div class="row">
			 <p class="text-center" style="font-size:25px;">Hours</p>
		</div>
var graph = document.getElementById('graph');
if(graph){
    ReactDOM.render(<Graph />, graph);
}