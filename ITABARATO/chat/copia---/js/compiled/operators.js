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
!function(t,o){o(document).ready(function(){o("a.remove-link").click(function(){var n=o(this).attr("href"),r=t.Localization.trans('Are you sure that you want to delete operator "{0}"?',o(this).data("operator-login"));return t.Utils.confirm(r,function(t){t&&(window.location.href=n)}),!1})})}(Mibew,jQuery);