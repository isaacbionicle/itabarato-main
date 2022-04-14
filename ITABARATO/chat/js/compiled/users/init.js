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
!function(o,e){o.Regions={},o.Popup={},o.Popup.open=function(o,e,n){e=e.replace(/[^A-z0-9_]+/g,"");var i=window.open(o,e,n);i.focus(),i.opener=window},o.Utils.updateTimers=function(o,n){o.find(n).each(function(){var o=e(this).data("timestamp");if(o){var n=Math.round((new Date).getTime()/1e3)-o,i=n%60,t=Math.floor(n/60)%60,a=Math.floor(n/3600),p=[];a>0&&p.push(a),p.push(t<10?"0"+t:t),p.push(i<10?"0"+i:i),e(this).html(p.join(":"))}})}}(Mibew,jQuery);