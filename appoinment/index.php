<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MOM PRO Doctor Reservation</title>
        <!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/agency.css" rel="stylesheet">
        

        <!-- scheduler theme -->
        <link type="text/css" rel="stylesheet" href="themes/scheduler_white.css" />    
        <link type="text/css" rel="stylesheet" href="themes/areas.css" />    

	<!-- helper libraries -->
	<script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
	
	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

        <style type="text/css">
            .scheduler_white_rowheader 
            {
                background: -webkit-gradient(linear, left top, left bottom, from(#eeeeee), to(#dddddd));
                    background: -moz-linear-gradient(top, #eeeeee 0%, #dddddd);
                    background: -ms-linear-gradient(top, #eeeeee 0%, #dddddd);
                    background: -webkit-linear-gradient(top, #eeeeee 0%, #dddddd);
                    background: linear-gradient(top, #eeeeee 0%, #dddddd);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr="#eeeeee", endColorStr="#dddddd");

            }
            .scheduler_white_rowheader_inner 
            {
                    border-right: 1px solid #ccc;
            }
            .scheduler_white_rowheadercol2
            {
                background: White;
            }
            .scheduler_white_rowheadercol2 .scheduler_white_rowheader_inner 
            {
                top: 2px;
                bottom: 2px;
                left: 2px;
                background-color: transparent;
                    border-left: 5px solid #1a9d13; /* green */
                    border-right: 0px none;
            }
            .status_dirty.scheduler_white_rowheadercol2 .scheduler_white_rowheader_inner
            {
                    border-left: 5px solid #ea3624; /* red */
            }
            .status_cleanup.scheduler_white_rowheadercol2 .scheduler_white_rowheader_inner
            {
                    border-left: 5px solid; /* orange */
            }

        </style>
        
    </head>
    <body style="background-color: #cccccc">
        
        <div class="col-lg-3">
            <div class="col-lg-12" style="background-color: #cccccc">
            <br>
            <p class="text-center text-info h2"><b><em><i>WELLCOME ADMIN</i></em></b></p><br>
            <div class="col-lg-1"></div>
            
            <div class="col-lg-10">
                
                <img src="../images/admin.jpg" class="img-rounded" width="180" height="180">
                
                <br><br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../Event/index.php" class="btn btn-primary">Doctor Schedule</a>
                </div>
                <br>
                <div class="btn-group btn-group-justified ">
                    <a href="index.php" class="btn btn-primary active">Appointment</a>
                </div>
                <br>
  

               
                <div class="btn-group btn-group-justified">
                    <a href="../admin/selectUser.php" class="btn btn-success">VIEW USERS DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../admin/insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../admin/updateHistory.php" class="btn btn-success">USER HISTORY</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../index.php" class="btn btn-danger ">Logout</a>
                </div>
                <br>
               
            </div>
            <div class="col-lg-1"></div>
            

        </div> 
        
        </div>
        
        <p class="text-center text-success h1"><b><em><i>MOMPRO Control Panel</i></em></b></p>
  
        
        <div class="col-lg-9">
        
            
            
            <div class="shadow"></div>
            <div class="hideSkipLink">
            </div>
            <div class="main">

                <div class="space">
                    Show Channeling Center:
                    <select id="filter">
                        <option value="0">All</option>
                        <option value="1">Channeling Center 1</option>
                        <option value="2">Channeling Center 2</option>
                        <option value="4">Channeling Center 3</option>
						<option value="4">Channeling Center 4</option>
                    </select>
                    
                    <div class="space">
                        Start date: <span id="start"></span> <a href="#" onclick="picker.show(); return false;">Select</a> 
                        Time range: 
                        <select id="timerange">
                            <option value="week">Week</option>
                            <option value="2weeks">2 Weeks</option>
                            <option value="month" selected>Month</option>
                            <option value="2months">2 Months</option>
                        </select>
                    </div>

                    <script type="text/javascript">
                        var picker = new DayPilot.DatePicker({
                            target: 'start', 
                            pattern: 'M/d/yyyy', 
                            date: new DayPilot.Date().firstDayOfMonth(),
                            onTimeRangeSelected: function(args) { 
                                dp.startDate = args.start;
                                loadEvents();
                            }
                        });
                        
                        $("#timerange").change(function() {
                            switch (this.value) {
                                case "week":
                                    dp.days = 7;
                                    break;
                                case "2weeks":
                                    dp.days = 14;
                                    break;
                                case "month":
                                    dp.days = dp.startDate.daysInMonth();
                                    break;
                                case "2months":
                                    dp.days = dp.startDate.daysInMonth() + dp.startDate.addMonths(1).daysInMonth();
                                    break;
                            }
                            loadEvents();
                        });
                    </script>                    
                </div>

                <div id="dp"></div>
                

                <script>
                    var dp = new DayPilot.Scheduler("dp");

                    dp.allowEventOverlap = false;
                    dp.scale = "Day";

                    dp.startDate = new DayPilot.Date().firstDayOfMonth();
                    dp.days = dp.startDate.daysInMonth();
                    
                    dp.theme = "scheduler_white";
                    
                    dp.eventDeleteHandling = "Update";

                    dp.timeHeaders = [
                        { groupBy: "Month", format: "MMMM yyyy" },
                        { groupBy: "Day", format: "d" }
                    ];

                    dp.eventHeight = 50;
                    dp.bubble = new DayPilot.Bubble({});
                    
                    dp.rowHeaderColumns = [
                        {title: "", width: 80},
                        {title: "Capacity", width: 0},
                        {title: "Status", width: 0}
                    ];
                    
                    dp.onBeforeResHeaderRender = function(args) {
                        var beds = function(count) {
                            return count + " bed" + (count > 1 ? "s" : "");
                        };
                        
                        args.resource.columns[0].html = beds(args.resource.capacity);
                        args.resource.columns[1].html = args.resource.status;
                        switch (args.resource.status) {
                            case "Dirty":
                                args.resource.cssClass = "status_dirty";
                                break;
                            case "Cleanup":
                                args.resource.cssClass = "status_cleanup";
                                break;
                        }
                    };
                                        
                    // http://api.daypilot.org/daypilot-scheduler-oneventmoved/ 
                    dp.onEventMoved = function (args) {
                        $.post("backend_move.php", 
                        {
                            id: args.e.id(),
                            newStart: args.newStart.toString(),
                            newEnd: args.newEnd.toString(),
                            newResource: args.newResource
                        }, 
                        function(data) {
                            dp.message(data.message);
                        });
                    };

                    // http://api.daypilot.org/daypilot-scheduler-oneventresized/ 
                    dp.onEventResized = function (args) {
                        $.post("backend_resize.php", 
                        {
                            id: args.e.id(),
                            newStart: args.newStart.toString(),
                            newEnd: args.newEnd.toString()
                        }, 
                        function() {
                            dp.message("Resized.");
                        });
                    };
                    
                    dp.onEventDeleted = function(args) {
                        $.post("backend_delete.php", 
                        {
                            id: args.e.id()
                        }, 
                        function() {
                            dp.message("Deleted.");
                        });
                    };
                    
                    // event creating
                    // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                    dp.onTimeRangeSelected = function (args) {
                        //var name = prompt("New event name:", "Event");
                        //if (!name) return;

                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            dp.clearSelection();
                            
                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
                        modal.showUrl("new.php?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);
                        
                    };

                    dp.onEventClick = function(args) {
                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
                        modal.showUrl("edit.php?id=" + args.e.id());
                    };
                    
                    dp.onBeforeCellRender = function(args) {
                        var dayOfWeek = args.cell.start.getDayOfWeek();
                        if (dayOfWeek === 6 || dayOfWeek === 0) {
                            args.cell.backColor = "#f8f8f8";
                        }
                    };

                    dp.onBeforeEventRender = function(args) {
                        var start = new DayPilot.Date(args.e.start);
                        var end = new DayPilot.Date(args.e.end);
                        
                        var today = new DayPilot.Date().getDatePart();
                        
                        args.e.html = args.e.text + " (" + start.toString("M/d/yyyy") + " - " + end.toString("M/d/yyyy") + ")"; 
                        
                        switch (args.e.status) {
                            case "New":
                                var in2days = today.addDays(1);
                                
                                if (start.getTime() < in2days.getTime()) {
                                    args.e.barColor = 'red';
                                    args.e.toolTip = 'Expired (not confirmed in time)';
                                }
                                else {
                                    args.e.barColor = 'orange';
                                    args.e.toolTip = 'New';
                                }
                                break;
                            case "Confirmed":
                                var arrivalDeadline = today.addHours(18);

                                if (start.getTime() < today.getTime() || (start.getTime() === today.getTime() && now.getTime() > arrivalDeadline.getTime())) { // must arrive before 6 pm
                                    args.e.barColor = "#f41616";  // red
                                    args.e.toolTip = 'Late arrival';
                                }
                                else {
                                    args.e.barColor = "green";
                                    args.e.toolTip = "Confirmed";
                                }
                                break;
                            case 'Arrived': // arrived
                                var checkoutDeadline = today.addHours(10);

                                if (end.getTime() < today.getTime() || (end.getTime() === today.getTime() && now.getTime() > checkoutDeadline.getTime())) { // must checkout before 10 am
                                    args.e.barColor = "#f41616";  // red
                                    args.e.toolTip = "Late checkout";
                                }
                                else
                                {
                                    args.e.barColor = "#1691f4";  // blue
                                    args.e.toolTip = "Arrived";
                                }
                                break;
                            case 'CheckedOut': // checked out
                                args.e.barColor = "gray";
                                args.e.toolTip = "Checked out";
                                break;
                            default:
                                args.e.toolTip = "Unexpected state";
                                break;    
                        }
                        
                        args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";
                        
                        var paid = args.e.paid;
                        var paidColor = "#aaaaaa";

                        args.e.areas = [
                            { bottom: 10, right: 4, html: "<div style='color:" + paidColor + "; font-size: 8pt;'>Paid: " + paid + "%</div>", v: "Visible"},
                            { left: 4, bottom: 8, right: 4, height: 2, html: "<div style='background-color:" + paidColor + "; height: 100%; width:" + paid + "%'></div>", v: "Visible" }
                        ];

                        //args.e.areas = [{"action":"JavaScript","js":"(function(e) { dp.events.remove(e); })","bottom":3,"w":17,"v":"Hover","css":"event_action_delete","top":5,"right":2}];
                    };


                    dp.init();

                    loadResources();
                    loadEvents();

                    function loadEvents() {
                        var start = dp.startDate;
                        var end = dp.startDate.addDays(dp.days);

                        $.post("backend_events.php", 
                            {
                                start: start.toString(),
                                end: end.toString()
                            },
                            function(data) {
                                dp.events.list = data;
                                dp.update();
                            }
                        );
                    }

                    function loadResources() {
                        $.post("backend_rooms.php", 
                        { capacity: $("#filter").val() },
                        function(data) {
                            dp.resources = data;
                            dp.update();
                        });
                    }
                    
                    $(document).ready(function() {
                        $("#filter").change(function() {
                            loadResources();
                        });
                    });

                </script>

            </div>
        </div>
        
        
        
            <div class="clear">
            </div>
			
			<div id="bottom">
            <br><br><br>
            
        </div>
    </body>
</html>
