@extends('cabinet.layout')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-title">
                    <h4>Trade History</h4>
                </div>
                <div class="card-body">
                    <div class="slimScroll" style="position: relative; overflow: hidden; width: auto; height: 360px;">
                        <div class="trade-history-table" style="overflow: hidden; width: auto; height: 360px;">
                            <div class="table-responsive">
                                <table class="table table-xs">
                                    <thead>
                                    <tr>
                                        <th>Валюта</th>
                                        <th>Количество</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><i class="cc USDT"></i> USDT</td>
                                        <td class="text-success">0.00</td>
                                        <td>
                                            Пополнить
                                            <br>
                                            Вывести
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11903.18</td>
                                        <td><i class="cc LTC"></i> 1.545</td>
                                        <td>11:23:05</td>
                                    </tr>
                                    <tr>
                                        <td class="text-success">11899.56</td>
                                        <td><i class="cc BTC"></i> 0.541</td>
                                        <td>11:22:50</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11910.52</td>
                                        <td><i class="cc BTC"></i> 0.321</td>
                                        <td>11:22:15</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11901.15</td>
                                        <td><i class="cc BTC"></i> 0.548</td>
                                        <td>11:21:25</td>
                                    </tr>
                                    <tr>
                                        <td class="text-success">11903.45</td>
                                        <td><i class="cc BTC"></i> 0.587</td>
                                        <td>11:21:01</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11895.50</td>
                                        <td><i class="cc BTC"></i> 5.125</td>
                                        <td>11:20:15</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11889.56</td>
                                        <td><i class="cc BTC"></i> 0.894</td>
                                        <td>11:20:03</td>
                                    </tr>
                                    <tr>
                                        <td class="text-success">11885.69</td>
                                        <td><i class="cc BTC"></i> 0.754</td>
                                        <td>11:19:55</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11891.12</td>
                                        <td><i class="cc BTC"></i> 0.889</td>
                                        <td>11:19:15</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">11889.88</td>
                                        <td><i class="cc BTC"></i> 0.654</td>
                                        <td>11:18:18</td>
                                    </tr>
                                    <tr>
                                        <td class="text-success">11881.15</td>
                                        <td><i class="cc BTC"></i> 1.254</td>
                                        <td>11:18:01</td>
                                    </tr>
                                    <tr>
                                        <td class="text-success">11875.75</td>
                                        <td><i class="cc BTC"></i> 0.885</td>
                                        <td>11:17:25</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="slimScrollBar" style="background: rgb(153, 153, 153); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 179.75px;"></div>
                        <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
            </div>
        </div>
    </div>

@endsection
