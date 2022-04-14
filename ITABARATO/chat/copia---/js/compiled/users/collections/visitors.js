/*!
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2018 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
!function(i,t,e){i.Collections.Visitors=t.Collection.extend({model:i.Models.Visitor,initialize:function(){var t=i.Objects.Models.agent;i.Objects.server.callFunctionsPeriodically(function(){return[{"function":"currentTime",arguments:{agentId:t.id,"return":{time:"currentTime"},references:{}}},{"function":"updateVisitors",arguments:{agentId:t.id,"return":{visitors:"visitors"},references:{}}}]},e.bind(this.updateVisitors,this))},comparator:function(i){var t={field:i.get("firstTime").toString()};return this.trigger("sort:field",i,t),t.field},updateVisitors:function(i){if(0==i.errorCode){var t;t=i.currentTime?Math.round((new Date).getTime()/1e3)-i.currentTime:0;for(var e=0,r=i.visitors.length;e<r;e++)i.visitors[e].lastTime=parseInt(i.visitors[e].lastTime)+t,i.visitors[e].firstTime=parseInt(i.visitors[e].firstTime)+t;this.trigger("before:update:visitors",i.visitors),this.reset(i.visitors),this.trigger("after:update:visitors")}}})}(Mibew,Backbone,_);