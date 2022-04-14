/*!
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2019 the original author or authors.
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
!function(e,t,i){e.Views.ThreadsCollection=e.Views.CompositeBase.extend({template:t.templates["users/threads_collection"],childViewContainer:"#threads-container",className:"threads-collection",collectionEvents:{sort:"render","sort:field":"createSortField",add:"threadAdded"},getChildView:function(t){return e.Views.QueuedThread},getEmptyView:function(){return e.Views.NoThreads},childViewOptions:function(t){var i=e.Objects.Models.page;return{tagName:i.get("threadTag"),collection:t.get("controls")}},initialize:function(){window.setInterval(i.bind(this.updateTimers,this),2e3),this.on("childview:before:render",this.updateStyles,this),this.on("render:collection",this.updateTimers,this)},updateStyles:function(e){var t=this.collection,i=e.model,s=this;if(i.id){var n=this.getQueueCode(i),a=!1,o=!1,r=t.filter(function(e){return s.getQueueCode(e)==n});if(r.length>0&&(o=r[0].id==i.id,a=r[r.length-1].id==i.id),e.lastStyles.length>0){for(var l=0,d=e.lastStyles.length;l<d;l++)e.$el.removeClass(e.lastStyles[l]);e.lastStyles=[]}var h=(n!=this.QUEUE_BAN?"in-":"")+this.queueCodeToString(n);e.lastStyles.push(h),o&&e.lastStyles.push(h+"-first"),a&&e.lastStyles.push(h+"-last");for(var l=0,d=e.lastStyles.length;l<d;l++)e.$el.addClass(e.lastStyles[l])}},updateTimers:function(){e.Utils.updateTimers(this.$el,".timesince")},createSortField:function(e,t){var i=this.getQueueCode(e)||"Z";t.field=i.toString()+"_"+e.get("waitingTime").toString()},threadAdded:function(t){var i=this.getQueueCode(t);if(i===this.QUEUE_WAITING||i===this.QUEUE_PRIO){var s=e.Objects.Models.page.get("mibewBasePath");"undefined"!=typeof s&&(s+="/sounds/new_user",e.Utils.playSound(s)),e.Objects.Models.page.get("showPopup")&&this.once("render",function(){e.Utils.alert(e.Localization.trans("A new visitor is waiting for an answer."))})}},getQueueCode:function(e){var t=e.get("state");return 0!=e.get("ban")&&t!=e.STATE_CHATTING?this.QUEUE_BAN:t==e.STATE_QUEUE||t==e.STATE_LOADING?this.QUEUE_WAITING:t==e.STATE_CLOSED||t==e.STATE_LEFT?this.QUEUE_CLOSED:t==e.STATE_WAITING?this.QUEUE_PRIO:t==e.STATE_CHATTING&&this.QUEUE_CHATTING},queueCodeToString:function(e){return e==this.QUEUE_PRIO?"priority-queue":e==this.QUEUE_WAITING?"waiting":e==this.QUEUE_CHATTING?"chat":e==this.QUEUE_BAN?"banned":e==this.QUEUE_CLOSED?"closed":""},QUEUE_PRIO:1,QUEUE_WAITING:2,QUEUE_CHATTING:3,QUEUE_BAN:4,QUEUE_CLOSED:5})}(Mibew,Handlebars,_);