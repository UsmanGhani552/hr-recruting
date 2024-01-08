<?php
$title = 'Vander Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'vender_dashboar';
use Illuminate\Support\Carbon;
?>
@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
    <section class="banner vendashbnr">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="bnr_left">
                        <p>Dashboard</p>
                        <h3>Welcome Back, {{ Auth::user()->name }}</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam.</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">
                    <p>Saturday, 1 July 2023</p>
                </div>
            </div>

            <ul class="row">
                <li class="col-md-3">
                    <div class="box">
                        <h3>
                            <small>Total Vendors</small>
                            {{ count($vendors) }}
                        </h3>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="box">
                        <h3>
                            <small>Total Client</small>
                            {{ count($clients) }}
                        </h3>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="box">
                        <h3>
                            <small>Total Staff</small>
                            {{ count($candidates) }}
                        </h3>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="box">
                        <h3>
                            <small>Total Jobs</small>
                            {{ count($jobs) }}
                        </h3>
                    </div>
                </li>
            </ul>

        </div>
    </section>

    <section class="login_act">
        <div class="container">
            <div class="row">
                <div class="col-md-6 recenact">
                    <div class="outbox">
                        <h6>Recent Vendors Login Activity</h6>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name:</th>
                                    <th></th>
                                    <th>Time :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jane Cooper</td>
                                    <td></td>
                                    <td style="color: #94A3B8;">Saturday, 1 July 2023</td>
                                </tr>
                                <tr>
                                    <td>Wade Warren</td>
                                    <td></td>
                                    <td style="color: #94A3B8;">Saturday, 1 July 2023</td>
                                </tr>
                                <tr>
                                    <td>Esther Howard</td>
                                    <td></td>
                                    <td style="color: #94A3B8;">Saturday, 1 July 2023</td>
                                </tr>
                                <tr>
                                    <td>Cameron Williamson</td>
                                    <td></td>
                                    <td style="color: #94A3B8;">Saturday, 1 July 2023</td>
                                </tr>
                                <tr>
                                    <td>Cameron Williamson</td>
                                    <td></td>
                                    <td style="color: #94A3B8;">Saturday, 1 July 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="outbox">
                        <h6>Recent Submissions</h6>
                        <table>
                            <thead>
                                <tr>
                                    <th>Job Title:</th>
                                    <th>Client Name:</th>
                                    <th>Vendor Name:</th>
                                    <th>Candidate Name:</th>
                                    <th>Status :</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submissions as $submission)
                                    <tr>
                                        {{-- <td>Jane Cooper</td>
							<td>Jane Cooper</td>
							<td>Jane Cooper</td>
							<td style="color: #FF9B25;">Inprocess</td> --}}
                                        <td>{{ $submission->job->title }}</td>
                                        <td>{{ $submission->client->name }}</td>
                                        @if ($submission->vendor_id == 1)
                                            <td>{{ $submission->user->name }}</td>
                                        @else
                                            <td>{{ $submission->vendor->first_name }}
                                                {{ $submission->vendor->last_name }}</td>
                                        @endif
                                        <td>{{ $submission->candidate->first_name }}
                                            {{ $submission->candidate->last_name }}</td>
                                        <td>{{ $submission->status == 1 ? 'Approved' : ($submission->status == 2 ? 'Pending' : 'Rejected') }}
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
							<td>Wade Warren</td>
							<td>Wade Warren</td>
							<td>Wade Warren</td>
							<td style="color: #24D164;">Approved</td>
						</tr>
						<tr>
							<td>Esther Howard</td>
							<td>Esther Howard</td>
							<td>Esther Howard</td>
							<td style="color: #ED4F75;">Decline</td>
						</tr>
						<tr>
							<td>Cameron Williamson</td>
							<td>Cameron Williamson</td>
							<td>Cameron Williamson</td>
							<td style="color: #94A3B8;">Pending</td>
						</tr>
						<tr>
							<td>Brooklyn Simmons</td>
							<td>Brooklyn Simmons</td>
							<td>Brooklyn Simmons</td>
							<td style="color: #24D164;">Approved</td>
						</tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="outbox">
                                <h6>Rate of Acceptance</h6>

                                <div class="cell">
                                    <div id="chart3"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">

                            <div class="outbox jobduration">
                                <h6>Approved Jobs Duration</h6>
                                <table>
                                    <tbody>
                                        @foreach ($approved_jobs as $approved_job)
                                            <?php
                                            $createdAt = Carbon::parse($approved_job->created_at);
                                            $completedAt = Carbon::parse($approved_job->completed_at);

                                            $diffInMonths = $completedAt->diffInMonths($createdAt);
                                            $diffInDays = $completedAt->diffInDays($createdAt) % 30;
                                            ?>
                                            <tr>
                                                <td>{{ $approved_job->title }}</td>
                                                <td style="color: #94A3B8;">
                                                    {{ ($diffInMonths > 0 ? $diffInMonths . ' months ' : '') . ($diffInDays > 0 ? $diffInDays . ' days' : '') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr>
								<tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr>
								<tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="outbox">
                                <h6>Gross Revenue</h6>
                                <!-- <figure>
                                    <img src="../images/chart.png">
                                   </figure> -->
                                <div class="chart-area"></div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="outbox clientstat">
                                <h6>Client Status</h6>
                                <ul>
                                    <li>
                                        <span><img src="{{ asset('assets/images/client_icon.png') }}"></span>
                                        <p>Active</p>
                                        <h4>{{ $count_active_clients }}</h4>
                                    </li>
                                    <li>
                                        <span><img src="{{ asset('assets/images/client_icon2.png') }}"></span>
                                        <p>Inactive</p>
                                        <h4>{{ $count_inactive_clients }}</h4>
                                    </li>
                                    {{-- <li>
                                        <span><img src="{{ asset('assets/images/client_icon3.png') }}"></span>
                                        <p>On Hold</p>
                                        <h4>25</h4>
                                    </li> --}}
                                </ul>

                                {{-- <div class="clientbox">
                                    <h4>
                                        <small>On-time Activeation Rate</small>
                                        95%
                                    </h4>
                                    <img src="{{ asset('assets/images/client_rates.png') }}">
                                </div> --}}

                            </div>
                        </div>

                        <div class="col-md-3">
                            <ul class="clientamout">
                                <li>
                                    <span>
                                        <img src="{{ asset('assets/images/shopping-cart-discount.png') }}">
                                    </span>
                                    <h4>
                                        <small>Total Amount</small>
                                        ${{ $admin_earning }}
                                    </h4>
                                </li>
                                <li>
                                    <span>
                                        <img src="{{ asset('assets/images/currency-dollar.png') }}">
                                    </span>
                                    <h4>
                                        <small>Vendor Earning</small>
                                        ${{ $vendor_earning }}
                                    </h4>
                                </li>
                                <li>
                                    <span>
                                        <img src="{{ asset('assets/images/coin.png') }}">
                                    </span>
                                    <h4>
                                        <small>Net Profit</small>
                                        ${{ $total_earning }}
                                    </h4>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </section>

    @include('layout.footer')
@endsection
@push('scripts')
    <script>
        // graph Chart

        const {
            Chart
        } = SingleDivUI;

        const options = {
            data: {
                labels: @json($labels),
                series: {
                    points: @json($points),
                },
            },
            height: 200,
            width: 400
        };

        new Chart("#chart3", {
            type: "area",
            ...options
        });


        // Donut Graph Chart

        var width = 100,
            height = 100;

        var outerRadius = width / 2;
        var innerRadius = 30;

        var data = @json($gross_percent_jobs);
        var pie = d3.layout.pie().value(function(d) {
            return d;
        });

        var endAng = function(d) {
            return (d / 100) * Math.PI * 2;
        };

        var bgArc = d3.svg
            .arc()
            .innerRadius(innerRadius)
            .outerRadius(outerRadius)
            .startAngle(0)
            .endAngle(Math.PI * 2);

        var dataArc = d3.svg
            .arc()
            .innerRadius(innerRadius)
            .outerRadius(outerRadius)
            .cornerRadius(15)
            .startAngle(0);

        var svg = d3
            .select(".chart-area")
            .append("svg")
            .attr("preserveAspectRatio", "xMinYMin meet")
            .attr("viewBox", "0 0 100 100")
            .attr("class", "shadow")
            .classed("svg-content", true);

        var path = svg
            .selectAll("g")
            .data(pie(data))
            .enter()
            .append("g")
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

        path
            .append("path")
            .attr("d", bgArc)
            .style("stroke-width", 5)
            .attr("fill", "rgba(0,0,0,0.2)");

        path
            .append("path")
            .attr("fill", "#fa7000")
            .transition()
            .ease("ease-in-out")
            .duration(750)
            .attrTween("d", arcTween);

        path
            .append("text")
            .attr("fill", "#fff")
            .attr("font-size", "1.3em")
            .attr("tex-anchor", "middle")
            .attr("x", -13)
            .attr("y", 8)
            .transition()
            .ease("ease-in-out")
            .duration(750)
            .attr("fill", "#000")
            .text(data);

        path
            .append("text")
            .attr("fill", "#fff")
            .attr("class", "ratingtext")
            .attr("font-size", "0.6em")
            .attr("tex-anchor", "middle")
            .attr("x", 10)
            .attr("y", 8)
            .text("%")
            .transition()
            .ease("ease-in-out")
            .duration(750)
            .attr("fill", "#000");

        function arcTween(d) {
            var interpolate = d3.interpolate(d.startAngle, endAng(d.data));
            return function(t) {
                d.endAngle = interpolate(t);
                return dataArc(d);
            };
        }
    </script>
@endpush
