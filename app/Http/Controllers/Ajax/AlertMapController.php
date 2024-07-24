<?php
/**
 * AlertMapController.php
 *
 * -Description-
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @link       https://www.librenms.org
 *
 * @copyright  2019 Tony Murray
 * @copyright  2024 Adam James
 * @author     Tony Murray <murraytony@gmail.com>
 * @author     Adam James <adam.james@transitiv.co.uk>
 */

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertMapController extends Controller
{
    public function setView(Request $request)
    {
        $this->validate($request, [
            'alert_map_view' => 'required|numeric|in:0,1,2',
        ]);

        return $this->setSessionValue($request, 'alert_map_view');
    }

    public function setGroup(Request $request)
    {
        $this->validate($request, [
            'alert_map_group_view' => 'required|numeric',
        ]);

        return $this->setSessionValue($request, 'alert_map_group_view');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $key
     * @return \Illuminate\Http\JsonResponse
     */
    private function setSessionValue($request, $key)
    {
        $value = $request->get($key);
        $request->session()->put($key, $value);

        return response()->json([$key, $value]);
    }
}
