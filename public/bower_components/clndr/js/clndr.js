(function(factory){if(typeof define==='function'&&define.amd){define(['jquery','moment'],factory);}
else if(typeof exports==='object'){factory(require('jquery'),require('moment'));}
else{factory(jQuery,moment);}}(function($,moment){var pluginName='clndr';var clndrTemplate="<div class='clndr-controls'>"+
"<div class='clndr-control-button'>"+
"<span class='clndr-previous-button'>previous</span>"+
"</div>"+
"<div class='month'><%= month %> <%= year %></div>"+
"<div class='clndr-control-button rightalign'>"+
"<span class='clndr-next-button'>next</span>"+
"</div>"+
"</div>"+
"<table class='clndr-table' border='0' cellspacing='0' cellpadding='0'>"+
"<thead>"+
"<tr class='header-days'>"+
"<% for(var i = 0; i < daysOfTheWeek.length; i++) { %>"+
"<td class='header-day'><%= daysOfTheWeek[i] %></td>"+
"<% } %>"+
"</tr>"+
"</thead>"+
"<tbody>"+
"<% for(var i = 0; i < numberOfRows; i++){ %>"+
"<tr>"+
"<% for(var j = 0; j < 7; j++){ %>"+
"<% var d = j + i * 7; %>"+
"<td class='<%= days[d].classes %>'>"+
"<div class='day-contents'><%= days[d].day %></div>"+
"</td>"+
"<% } %>"+
"</tr>"+
"<% } %>"+
"</tbody>"+
"</table>";var defaults={events:[],ready:null,extras:null,render:null,moment:null,weekOffset:0,constraints:null,forceSixRows:null,selectedDate:null,doneRendering:null,daysOfTheWeek:null,multiDayEvents:null,startWithMonth:null,dateParameter:'date',template:clndrTemplate,showAdjacentMonths:true,trackSelectedDate:false,adjacentDaysChangeMonth:false,ignoreInactiveDaysInSelection:null,lengthOfTime:{days:null,interval:1,months:null},clickEvents:{click:null,today:null,nextYear:null,nextMonth:null,nextInterval:null,previousYear:null,onYearChange:null,previousMonth:null,onMonthChange:null,previousInterval:null,onIntervalChange:null},targets:{day:'day',empty:'empty',nextButton:'clndr-next-button',todayButton:'clndr-today-button',previousButton:'clndr-previous-button',nextYearButton:'clndr-next-year-button',previousYearButton:'clndr-previous-year-button'},classes:{past:"past",today:"today",event:"event",inactive:"inactive",selected:"selected",lastMonth:"last-month",nextMonth:"next-month",adjacentMonth:"adjacent-month"},};function Clndr(element,options){var dayDiff;var constraintEnd;var constraintStart;this.element=element;this.options=$.extend(true,{},defaults,options);if(this.options.moment){moment=this.options.moment;}
this.constraints={next:true,today:true,previous:true,nextYear:true,previousYear:true};if(this.options.events.length){if(this.options.multiDayEvents){this.options.events=this.addMultiDayMomentObjectsToEvents(this.options.events);}else{this.options.events=this.addMomentObjectToEvents(this.options.events);}}
if(this.options.lengthOfTime.months||this.options.lengthOfTime.days){if(this.options.lengthOfTime.months){this.options.lengthOfTime.days=null;if(this.options.lengthOfTime.startDate){this.intervalStart=moment(this.options.lengthOfTime.startDate).startOf('month');}else if(this.options.startWithMonth){this.intervalStart=moment(this.options.startWithMonth).startOf('month');}else{this.intervalStart=moment().startOf('month');}
this.intervalEnd=moment(this.intervalStart).add(this.options.lengthOfTime.months,'months').subtract(1,'days');this.month=this.intervalStart.clone();}
else if(this.options.lengthOfTime.days){if(this.options.lengthOfTime.startDate){this.intervalStart=moment(this.options.lengthOfTime.startDate).startOf('day');}else{this.intervalStart=moment().weekday(0).startOf('day');}
this.intervalEnd=moment(this.intervalStart).add(this.options.lengthOfTime.days-1,'days').endOf('day');this.month=this.intervalStart.clone();}}else{this.month=moment().startOf('month');this.intervalStart=moment(this.month);this.intervalEnd=moment(this.month).endOf('month');}
if(this.options.startWithMonth){this.month=moment(this.options.startWithMonth).startOf('month');this.intervalStart=moment(this.month);this.intervalEnd=(this.options.lengthOfTime.days)?moment(this.month).add(this.options.lengthOfTime.days-1,'days').endOf('day'):moment(this.month).endOf('month');}
if(this.options.constraints){if(this.options.constraints.startDate){constraintStart=moment(this.options.constraints.startDate);if(this.options.lengthOfTime.days){if(this.intervalStart.isBefore(constraintStart,'week')){this.intervalStart=constraintStart.startOf('week');}
dayDiff=this.intervalStart.diff(this.intervalEnd,'days');if(dayDiff<this.options.lengthOfTime.days||this.intervalEnd.isBefore(this.intervalStart))
{this.intervalEnd=moment(this.intervalStart).add(this.options.lengthOfTime.days-1,'days').endOf('day');this.month=this.intervalStart.clone();}}
else{if(this.intervalStart.isBefore(constraintStart,'month')){this.intervalStart.set('month',constraintStart.month()).set('year',constraintStart.year());this.month.set('month',constraintStart.month()).set('year',constraintStart.year());}
if(this.intervalEnd.isBefore(constraintStart,'month')){this.intervalEnd.set('month',constraintStart.month()).set('year',constraintStart.year());}}}
if(this.options.constraints.endDate){constraintEnd=moment(this.options.constraints.endDate);if(this.options.lengthOfTime.days){if(this.intervalStart.isAfter(constraintEnd,'week')){this.intervalStart=moment(constraintEnd).endOf('week').subtract(this.options.lengthOfTime.days-1,'days').startOf('day');this.intervalEnd=moment(constraintEnd).endOf('week');this.month=this.intervalStart.clone();}}
else{if(this.intervalEnd.isAfter(constraintEnd,'month')){this.intervalEnd.set('month',constraintEnd.month()).set('year',constraintEnd.year());this.month.set('month',constraintEnd.month()).set('year',constraintEnd.year());}
if(this.intervalStart.isAfter(constraintEnd,'month')){this.intervalStart.set('month',constraintEnd.month()).set('year',constraintEnd.year());}}}}
this._defaults=defaults;this._name=pluginName;this.init();}
Clndr.prototype.init=function(){this.daysOfTheWeek=this.options.daysOfTheWeek||[];if(!this.options.daysOfTheWeek){this.daysOfTheWeek=[];for(var i=0;i<7;i++){this.daysOfTheWeek.push(moment().weekday(i).format('dd').charAt(0));}}
if(this.options.weekOffset){this.daysOfTheWeek=this.shiftWeekdayLabels(this.options.weekOffset);}
if(!$.isFunction(this.options.render)){this.options.render=null;if(typeof _==='undefined'){throw new Error("Underscore was not found. Please include underscore.js "+
"OR provide a custom render function.");}else{this.compiledClndrTemplate=_.template(this.options.template);}}
$(this.element).html("<div class='clndr'></div>");this.calendarContainer=$('.clndr',this.element);this.bindEvents();this.render();if(this.options.ready){this.options.ready.apply(this,[]);}};Clndr.prototype.shiftWeekdayLabels=function(offset){var days=this.daysOfTheWeek;for(var i=0;i<offset;i++){days.push(days.shift());}
return days;};Clndr.prototype.createDaysObject=function(startDate,endDate){var daysArray=[],date=startDate.clone(),lengthOfInterval=endDate.diff(startDate,'days'),startOfLastMonth,endOfLastMonth,startOfNextMonth,endOfNextMonth,diff,dateIterator;this._currentIntervalStart=startDate.clone();this.eventsLastMonth=[];this.eventsNextMonth=[];this.eventsThisInterval=[];if(this.options.events.length){this.eventsThisInterval=$(this.options.events).filter(function(){var afterEnd=this._clndrStartDateObject.isAfter(endDate),beforeStart=this._clndrEndDateObject.isBefore(startDate);if(beforeStart||afterEnd){return false;}else{return true;}}).toArray();if(this.options.showAdjacentMonths){startOfLastMonth=startDate.clone().subtract(1,'months').startOf('month');endOfLastMonth=startOfLastMonth.clone().endOf('month');startOfNextMonth=endDate.clone().add(1,'months').startOf('month');endOfNextMonth=startOfNextMonth.clone().endOf('month');this.eventsLastMonth=$(this.options.events).filter(function(){var beforeStart=this._clndrEndDateObject.isBefore(startOfLastMonth);var afterEnd=this._clndrStartDateObject.isAfter(endOfLastMonth);if(beforeStart||afterEnd){return false;}else{return true;}}).toArray();this.eventsNextMonth=$(this.options.events).filter(function(){var beforeStart=this._clndrEndDateObject.isBefore(startOfNextMonth);var afterEnd=this._clndrStartDateObject.isAfter(endOfNextMonth);if(beforeStart||afterEnd){return false;}else{return true;}}).toArray();}}
if(!this.options.lengthOfTime.days){diff=date.weekday()-this.options.weekOffset;if(diff<0){diff+=7;}
if(this.options.showAdjacentMonths){for(var i=1;i<=diff;i++){var day=moment([startDate.year(),startDate.month(),i]).subtract(diff,'days');daysArray.push(this.createDayObject(day,this.eventsLastMonth));}}else{for(var i=0;i<diff;i++){daysArray.push(this.calendarDay({classes:this.options.targets.empty+
" "+this.options.classes.lastMonth}));}}}
dateIterator=startDate.clone();while(dateIterator.isBefore(endDate)||dateIterator.isSame(endDate,'day')){daysArray.push(this.createDayObject(dateIterator.clone(),this.eventsThisInterval));dateIterator.add(1,'days');}
if(!this.options.lengthOfTime.days){while(daysArray.length%7!==0){if(this.options.showAdjacentMonths){daysArray.push(this.createDayObject(dateIterator.clone(),this.eventsNextMonth));}else{daysArray.push(this.calendarDay({classes:this.options.targets.empty+" "+
this.options.classes.nextMonth}));}
dateIterator.add(1,'days');}}
if(this.options.forceSixRows&&daysArray.length!==42){while(daysArray.length<42){if(this.options.showAdjacentMonths){daysArray.push(this.createDayObject(dateIterator.clone(),this.eventsNextMonth));dateIterator.add(1,'days');}else{daysArray.push(this.calendarDay({classes:this.options.targets.empty+" "+
this.options.classes.nextMonth}));}}}
return daysArray;};Clndr.prototype.createDayObject=function(day,monthEvents){var j=0,self=this,now=moment(),eventsToday=[],extraClasses="",properties={isToday:false,isInactive:false,isAdjacentMonth:false},startMoment,endMoment,selectedMoment;if(!day.isValid()&&day.hasOwnProperty('_d')&&day._d!=undefined){day=moment(day._d);}
for(j;j<monthEvents.length;j++){var start=monthEvents[j]._clndrStartDateObject,end=monthEvents[j]._clndrEndDateObject;if((day.isSame(start,'day')||day.isAfter(start,'day'))&&(day.isSame(end,'day')||day.isBefore(end,'day')))
{eventsToday.push(monthEvents[j]);}}
if(now.format("YYYY-MM-DD")==day.format("YYYY-MM-DD")){extraClasses+=(" "+this.options.classes.today);properties.isToday=true;}
if(day.isBefore(now,'day')){extraClasses+=(" "+this.options.classes.past);}
if(eventsToday.length){extraClasses+=(" "+this.options.classes.event);}
if(!this.options.lengthOfTime.days){if(this._currentIntervalStart.month()>day.month()){extraClasses+=(" "+this.options.classes.adjacentMonth);properties.isAdjacentMonth=true;this._currentIntervalStart.year()===day.year()?extraClasses+=(" "+this.options.classes.lastMonth):extraClasses+=(" "+this.options.classes.nextMonth);}
else if(this._currentIntervalStart.month()<day.month()){extraClasses+=(" "+this.options.classes.adjacentMonth);properties.isAdjacentMonth=true;this._currentIntervalStart.year()===day.year()?extraClasses+=(" "+this.options.classes.nextMonth):extraClasses+=(" "+this.options.classes.lastMonth);}}
if(this.options.constraints){endMoment=moment(this.options.constraints.endDate);startMoment=moment(this.options.constraints.startDate);if(this.options.constraints.startDate&&day.isBefore(startMoment)){extraClasses+=(" "+this.options.classes.inactive);properties.isInactive=true;}
if(this.options.constraints.endDate&&day.isAfter(endMoment)){extraClasses+=(" "+this.options.classes.inactive);properties.isInactive=true;}}
if(!day.isValid()&&day.hasOwnProperty('_d')&&day._d!=undefined){day=moment(day._d);}
selectedMoment=moment(this.options.selectedDate);if(this.options.selectedDate&&day.isSame(selectedMoment,'day')){extraClasses+=(" "+this.options.classes.selected);}
extraClasses+=" calendar-day-"+day.format("YYYY-MM-DD");extraClasses+=" calendar-dow-"+day.weekday();return this.calendarDay({date:day,day:day.date(),events:eventsToday,properties:properties,classes:this.options.targets.day+extraClasses});};Clndr.prototype.render=function(){var data={},end=null,start=null,oneYearFromEnd=this.intervalEnd.clone().add(1,'years'),oneYearAgo=this.intervalStart.clone().subtract(1,'years'),days,months,currentMonth,eventsThisInterval,numberOfRows;this.calendarContainer.empty();if(this.options.lengthOfTime.days){days=this.createDaysObject(this.intervalStart.clone(),this.intervalEnd.clone());data={days:days,months:[],year:null,month:null,eventsLastMonth:[],eventsNextMonth:[],eventsThisMonth:[],extras:this.options.extras,daysOfTheWeek:this.daysOfTheWeek,intervalEnd:this.intervalEnd.clone(),numberOfRows:Math.ceil(days.length/7),intervalStart:this.intervalStart.clone(),eventsThisInterval:this.eventsThisInterval};}
else if(this.options.lengthOfTime.months){months=[];numberOfRows=0;eventsThisInterval=[];for(i=0;i<this.options.lengthOfTime.months;i++){var currentIntervalStart=this.intervalStart.clone().add(i,'months');var currentIntervalEnd=currentIntervalStart.clone().endOf('month');var days=this.createDaysObject(currentIntervalStart,currentIntervalEnd);eventsThisInterval.push(this.eventsThisInterval);months.push({days:days,month:currentIntervalStart});}
for(i in months){numberOfRows+=Math.ceil(months[i].days.length/7);}
data={days:[],year:null,month:null,months:months,eventsThisMonth:[],numberOfRows:numberOfRows,extras:this.options.extras,intervalEnd:this.intervalEnd,intervalStart:this.intervalStart,daysOfTheWeek:this.daysOfTheWeek,eventsLastMonth:this.eventsLastMonth,eventsNextMonth:this.eventsNextMonth,eventsThisInterval:eventsThisInterval,};}
else{days=this.createDaysObject(this.month.clone().startOf('month'),this.month.clone().endOf('month'));currentMonth=this.month;data={days:days,months:[],intervalEnd:null,intervalStart:null,year:this.month.year(),eventsThisInterval:null,extras:this.options.extras,month:this.month.format('MMMM'),daysOfTheWeek:this.daysOfTheWeek,eventsLastMonth:this.eventsLastMonth,eventsNextMonth:this.eventsNextMonth,numberOfRows:Math.ceil(days.length/7),eventsThisMonth:this.eventsThisInterval};}
if(!this.options.render){this.calendarContainer.html(this.compiledClndrTemplate(data));}else{this.calendarContainer.html(this.options.render.apply(this,[data]));}
if(this.options.constraints){for(var target in this.options.targets){if(target!=this.options.targets.day){this.element.find('.'+this.options.targets[target]).toggleClass(this.options.classes.inactive,false);}}
for(var i in this.constraints){this.constraints[i]=true;}
if(this.options.constraints.startDate){start=moment(this.options.constraints.startDate);}
if(this.options.constraints.endDate){end=moment(this.options.constraints.endDate);}
if(start&&(start.isAfter(this.intervalStart)||start.isSame(this.intervalStart,'day')))
{this.element.find('.'+this.options.targets.previousButton).toggleClass(this.options.classes.inactive,true);this.constraints.previous=!this.constraints.previous;}
if(end&&(end.isBefore(this.intervalEnd)||end.isSame(this.intervalEnd,'day')))
{this.element.find('.'+this.options.targets.nextButton).toggleClass(this.options.classes.inactive,true);this.constraints.next=!this.constraints.next;}
if(start&&start.isAfter(oneYearAgo)){this.element.find('.'+this.options.targets.previousYearButton).toggleClass(this.options.classes.inactive,true);this.constraints.previousYear=!this.constraints.previousYear;}
if(end&&end.isBefore(oneYearFromEnd)){this.element.find('.'+this.options.targets.nextYearButton).toggleClass(this.options.classes.inactive,true);this.constraints.nextYear=!this.constraints.nextYear;}
if((start&&start.isAfter(moment(),'month'))||(end&&end.isBefore(moment(),'month')))
{this.element.find('.'+this.options.targets.today).toggleClass(this.options.classes.inactive,true);this.constraints.today=!this.constraints.today;}}
if(this.options.doneRendering){this.options.doneRendering.apply(this,[]);}};Clndr.prototype.bindEvents=function(){var data={},self=this,$container=$(this.element),targets=this.options.targets,classes=self.options.classes,eventType=(this.options.useTouchEvents===true)?'touchstart':'click',eventName=eventType+'.clndr';$container.off(eventName,'.'+targets.day).off(eventName,'.'+targets.empty).off(eventName,'.'+targets.nextButton).off(eventName,'.'+targets.todayButton).off(eventName,'.'+targets.previousButton).off(eventName,'.'+targets.nextYearButton).off(eventName,'.'+targets.previousYearButton);$container.on(eventName,'.'+targets.day,function(event){var target,$currentTarget=$(event.currentTarget);if(self.options.clickEvents.click){target=self.buildTargetObject(event.currentTarget,true);self.options.clickEvents.click.apply(self,[target]);}
if(self.options.adjacentDaysChangeMonth){if($currentTarget.is('.'+classes.lastMonth)){self.backActionWithContext(self);}
else if($currentTarget.is('.'+classes.nextMonth)){self.forwardActionWithContext(self);}}
if(self.options.trackSelectedDate){if(self.options.ignoreInactiveDaysInSelection&&$currentTarget.hasClass(classes.inactive))
{return;}
self.options.selectedDate=self.getTargetDateString(event.currentTarget);$container.find('.'+classes.selected).removeClass(classes.selected);$currentTarget.addClass(classes.selected);}});$container.on(eventName,'.'+targets.empty,function(event){var target,$eventTarget=$(event.currentTarget);if(self.options.clickEvents.click){target=self.buildTargetObject(event.currentTarget,false);self.options.clickEvents.click.apply(self,[target]);}
if(self.options.adjacentDaysChangeMonth){if($eventTarget.is('.'+classes.lastMonth)){self.backActionWithContext(self);}
else if($eventTarget.is('.'+classes.nextMonth)){self.forwardActionWithContext(self);}}});data={context:this};$container.on(eventName,'.'+targets.todayButton,data,this.todayAction).on(eventName,'.'+targets.nextButton,data,this.forwardAction).on(eventName,'.'+targets.previousButton,data,this.backAction).on(eventName,'.'+targets.nextYearButton,data,this.nextYearAction).on(eventName,'.'+targets.previousYearButton,data,this.previousYearAction);};Clndr.prototype.buildTargetObject=function(currentTarget,targetWasDay){var target={date:null,events:[],element:currentTarget};var dateString,filterFn;if(targetWasDay){dateString=this.getTargetDateString(currentTarget);target.date=(dateString)?moment(dateString):null;if(this.options.events){if(this.options.multiDayEvents){filterFn=function(){var isSameStart=target.date.isSame(this._clndrStartDateObject,'day');var isAfterStart=target.date.isAfter(this._clndrStartDateObject,'day');var isSameEnd=target.date.isSame(this._clndrEndDateObject,'day');var isBeforeEnd=target.date.isBefore(this._clndrEndDateObject,'day');return(isSameStart||isAfterStart)&&(isSameEnd||isBeforeEnd);};}
else{filterFn=function(){var startString=this._clndrStartDateObject.format('YYYY-MM-DD');return startString==dateString;};}
target.events=$.makeArray($(this.options.events).filter(filterFn));}}
return target;};Clndr.prototype.getTargetDateString=function(target){var classNameIndex=target.className.indexOf('calendar-day-');if(classNameIndex!==-1){return target.className.substring(classNameIndex+13,classNameIndex+23);}
return null;};Clndr.prototype.triggerEvents=function(ctx,orig){var timeOpt=ctx.options.lengthOfTime,eventsOpt=ctx.options.clickEvents,newInt={end:ctx.intervalEnd,start:ctx.intervalStart},intervalArg=[moment(ctx.intervalStart),moment(ctx.intervalEnd)],monthArg=[moment(ctx.month)],nextYear,prevYear,yearChanged,nextMonth,prevMonth,monthChanged,nextInterval,prevInterval,intervalChanged;nextMonth=newInt.start.isAfter(orig.start)&&(Math.abs(newInt.start.month()-orig.start.month())==1||orig.start.month()===11&&newInt.start.month()===0);prevMonth=newInt.start.isBefore(orig.start)&&(Math.abs(orig.start.month()-newInt.start.month())==1||orig.start.month()===0&&newInt.start.month()===11);monthChanged=newInt.start.month()!==orig.start.month()||newInt.start.year()!==orig.start.year();nextYear=newInt.start.year()-orig.start.year()===1||newInt.end.year()-orig.end.year()===1;prevYear=orig.start.year()-newInt.start.year()===1||orig.end.year()-newInt.end.year()===1;yearChanged=newInt.start.year()!==orig.start.year();if(timeOpt.days||timeOpt.months){nextInterval=newInt.start.isAfter(orig.start);prevInterval=newInt.start.isBefore(orig.start);intervalChanged=nextInterval||prevInterval;if(nextInterval&&eventsOpt.nextInterval){eventsOpt.nextInterval.apply(ctx,intervalArg);}
if(prevInterval&&eventsOpt.previousInterval){eventsOpt.previousInterval.apply(ctx,intervalArg);}
if(intervalChanged&&eventsOpt.onIntervalChange){eventsOpt.onIntervalChange.apply(ctx,intervalArg);}}
else{if(nextMonth&&eventsOpt.nextMonth){eventsOpt.nextMonth.apply(ctx,monthArg);}
if(prevMonth&&eventsOpt.previousMonth){eventsOpt.previousMonth.apply(ctx,monthArg);}
if(monthChanged&&eventsOpt.onMonthChange){eventsOpt.onMonthChange.apply(ctx,monthArg);}
if(nextYear&&eventsOpt.nextYear){eventsOpt.nextYear.apply(ctx,monthArg);}
if(prevYear&&eventsOpt.previousYear){eventsOpt.previousYear.apply(ctx,monthArg);}
if(yearChanged&&eventsOpt.onYearChange){eventsOpt.onYearChange.apply(ctx,monthArg);}}};Clndr.prototype.back=function(options){var yearChanged=null,ctx=(arguments.length>1)?arguments[1]:this,timeOpt=ctx.options.lengthOfTime,defaults={withCallbacks:false},orig={end:ctx.intervalEnd.clone(),start:ctx.intervalStart.clone()};options=$.extend(true,{},defaults,options);if(!ctx.constraints.previous){return ctx;}
if(!timeOpt.days){ctx.intervalStart.subtract(timeOpt.interval,'months').startOf('month');ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.months||timeOpt.interval,'months').subtract(1,'days').endOf('month');ctx.month=ctx.intervalStart.clone();}
else{ctx.intervalStart.subtract(timeOpt.interval,'days').startOf('day');ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.days-1,'days').endOf('day');ctx.month=ctx.intervalStart.clone();}
ctx.render();if(options.withCallbacks){ctx.triggerEvents(ctx,orig);}
return ctx;};Clndr.prototype.backAction=function(event){var ctx=event.data.context;ctx.backActionWithContext(ctx);};Clndr.prototype.backActionWithContext=function(ctx){ctx.back({withCallbacks:true},ctx);};Clndr.prototype.previous=function(options){return this.back(options);};Clndr.prototype.forward=function(options){var ctx=(arguments.length>1)?arguments[1]:this,timeOpt=ctx.options.lengthOfTime,defaults={withCallbacks:false},orig={end:ctx.intervalEnd.clone(),start:ctx.intervalStart.clone()};options=$.extend(true,{},defaults,options);if(!ctx.constraints.next){return ctx;}
if(ctx.options.lengthOfTime.days){ctx.intervalStart.add(timeOpt.interval,'days').startOf('day');ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.days-1,'days').endOf('day');ctx.month=ctx.intervalStart.clone();}
else{ctx.intervalStart.add(timeOpt.interval,'months').startOf('month');ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.months||timeOpt.interval,'months').subtract(1,'days').endOf('month');ctx.month=ctx.intervalStart.clone();}
ctx.render();if(options.withCallbacks){ctx.triggerEvents(ctx,orig);}
return ctx;};Clndr.prototype.forwardAction=function(event){var ctx=event.data.context;ctx.forwardActionWithContext(ctx);};Clndr.prototype.forwardActionWithContext=function(ctx){ctx.forward({withCallbacks:true},ctx);};Clndr.prototype.next=function(options){return this.forward(options);};Clndr.prototype.previousYear=function(options){var ctx=(arguments.length>1)?arguments[1]:this,defaults={withCallbacks:false},orig={end:ctx.intervalEnd.clone(),start:ctx.intervalStart.clone()};options=$.extend(true,{},defaults,options);if(!ctx.constraints.previousYear){return ctx;}
ctx.month.subtract(1,'year');ctx.intervalStart.subtract(1,'year');ctx.intervalEnd.subtract(1,'year');ctx.render();if(options.withCallbacks){ctx.triggerEvents(ctx,orig);}
return ctx;};Clndr.prototype.previousYearAction=function(event){var ctx=event.data.context;ctx.previousYear({withCallbacks:true},ctx);};Clndr.prototype.nextYear=function(options){var ctx=(arguments.length>1)?arguments[1]:this,defaults={withCallbacks:false},orig={end:ctx.intervalEnd.clone(),start:ctx.intervalStart.clone()};options=$.extend(true,{},defaults,options);if(!ctx.constraints.nextYear){return ctx;}
ctx.month.add(1,'year');ctx.intervalStart.add(1,'year');ctx.intervalEnd.add(1,'year');ctx.render();if(options.withCallbacks){ctx.triggerEvents(ctx,orig);}
return ctx;};Clndr.prototype.nextYearAction=function(event){var ctx=event.data.context;ctx.nextYear({withCallbacks:true},ctx);};Clndr.prototype.today=function(options){var ctx=(arguments.length>1)?arguments[1]:this,timeOpt=ctx.options.lengthOfTime,defaults={withCallbacks:false},orig={end:ctx.intervalEnd.clone(),start:ctx.intervalStart.clone()};options=$.extend(true,{},defaults,options);ctx.month=moment().startOf('month');if(timeOpt.days){if(timeOpt.startDate){ctx.intervalStart=moment().weekday(timeOpt.startDate.weekday()).startOf('day');}else{ctx.intervalStart=moment().weekday(0).startOf('day');}
ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.days-1,'days').endOf('day');}
else{ctx.intervalStart=moment().startOf('month');ctx.intervalEnd=ctx.intervalStart.clone().add(timeOpt.months||timeOpt.interval,'months').subtract(1,'days').endOf('month');}
if(!ctx.intervalStart.isSame(orig.start)||!ctx.intervalEnd.isSame(orig.end))
{ctx.render();}
if(options.withCallbacks){if(ctx.options.clickEvents.today){ctx.options.clickEvents.today.apply(ctx,[moment(ctx.month)]);}
ctx.triggerEvents(ctx,orig);}};Clndr.prototype.todayAction=function(event){var ctx=event.data.context;ctx.today({withCallbacks:true},ctx);};Clndr.prototype.setMonth=function(newMonth,options){var timeOpt=this.options.lengthOfTime,orig={end:this.intervalEnd.clone(),start:this.intervalStart.clone()};if(timeOpt.days||timeOpt.months){console.log('You are using a custom date interval. Use '+
'Clndr.setIntervalStart(startDate) instead.');return this;}
this.month.month(newMonth);this.intervalStart=this.month.clone().startOf('month');this.intervalEnd=this.intervalStart.clone().endOf('month');this.render();if(options&&options.withCallbacks){this.triggerEvents(this,orig);}
return this;};Clndr.prototype.setYear=function(newYear,options){var orig={end:this.intervalEnd.clone(),start:this.intervalStart.clone()};this.month.year(newYear);this.intervalEnd.year(newYear);this.intervalStart.year(newYear);this.render();if(options&&options.withCallbacks){this.triggerEvents(this,orig);}
return this;};Clndr.prototype.setIntervalStart=function(newDate,options){var timeOpt=this.options.lengthOfTime,orig={end:this.intervalEnd.clone(),start:this.intervalStart.clone()};if(!timeOpt.days&&!timeOpt.months){console.log('You are using a custom date interval. Use '+
'Clndr.setIntervalStart(startDate) instead.');return this;}
if(timeOpt.days){this.intervalStart=moment(newDate).startOf('day');this.intervalEnd=this.intervalStart.clone().add(timeOpt-1,'days').endOf('day');}else{this.intervalStart=moment(newDate).startOf('month');this.intervalEnd=this.intervalStart.clone().add(timeOpt.months||timeOpt.interval,'months').subtract(1,'days').endOf('month');}
this.month=this.intervalStart.clone();this.render();if(options&&options.withCallbacks){this.triggerEvents(this,orig);}
return this;};Clndr.prototype.setEvents=function(events){if(this.options.multiDayEvents){this.options.events=this.addMultiDayMomentObjectsToEvents(events);}else{this.options.events=this.addMomentObjectToEvents(events);}
this.render();return this;};Clndr.prototype.addEvents=function(events){var reRender=(arguments.length>1)?arguments[1]:true;if(this.options.multiDayEvents){this.options.events=$.merge(this.options.events,this.addMultiDayMomentObjectsToEvents(events));}else{this.options.events=$.merge(this.options.events,this.addMomentObjectToEvents(events));}
if(reRender){this.render();}
return this;};Clndr.prototype.removeEvents=function(matchingFn){for(var i=this.options.events.length-1;i>=0;i--){if(matchingFn(this.options.events[i])==true){this.options.events.splice(i,1);}}
this.render();return this;};Clndr.prototype.addMomentObjectToEvents=function(events){var i=0,self=this;for(i;i<events.length;i++){events[i]._clndrStartDateObject=moment(events[i][self.options.dateParameter]);events[i]._clndrEndDateObject=moment(events[i][self.options.dateParameter]);}
return events;};Clndr.prototype.addMultiDayMomentObjectsToEvents=function(events){var i=0,self=this,multiEvents=self.options.multiDayEvents;for(i;i<events.length;i++){var end=events[i][multiEvents.endDate],start=events[i][multiEvents.startDate];if(!end&&!start){events[i]._clndrEndDateObject=moment(events[i][multiEvents.singleDay]);events[i]._clndrStartDateObject=moment(events[i][multiEvents.singleDay]);}
else{events[i]._clndrEndDateObject=moment(end||start);events[i]._clndrStartDateObject=moment(start||end);}}
return events;};Clndr.prototype.calendarDay=function(options){var defaults={day:"",date:null,events:[],classes:this.options.targets.empty};return $.extend({},defaults,options);};Clndr.prototype.destroy=function(){var $container=$(this.calendarContainer);$container.parent().data('plugin_clndr',null);this.options=defaults;$container.empty().remove();this.element=null;};$.fn.clndr=function(options){var clndrInstance;if(this.length>1){throw new Error("CLNDR does not support multiple elements yet. Make sure "+
"your clndr selector returns only one element.");}
if(!this.length){throw new Error("CLNDR cannot be instantiated on an empty selector.");}
if(!this.data('plugin_clndr')){clndrInstance=new Clndr(this,options);this.data('plugin_clndr',clndrInstance);return clndrInstance;}
return this.data('plugin_clndr');};}));