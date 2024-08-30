<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                margin-bottom: 60px;
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 60px;
                background-color: #f5f5f5;
            }

            p.card-text {
                margin-top: -10px;
            }
    </style>
        <title>Sample Site: Weather Application</title>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar dark bg-dark sticky-top" style="fg-color: white;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Weather Application</a>
            </div>
        </nav>

        <div class="container">
            <h1 class="mt-5 mb-4">Weather Information</h1>
            <div class="input-group mb-3">
                <form action="{{ route('weather.form') }}" method="post" class="form-inline">
                    @csrf
                    <div class="d-flex">
                        <div class="form-group">
                            <select class="form-select" name="city" id="city">
                                <option value="-1">--Select City--</option>
                                <option value="Caracas">&#x1F1FB;&#x1F1EA; Caracas, VE</option>
                                <option value="New York City">&#x1F1FA;&#x1F1F8; New York City, NY</option>
                                <option value="Miami">&#x1F1FA;&#x1F1F8; Miami, FL</option>
                                <option value="London">&#x1F1EC;&#x1F1E7; London, UK</option>
                                <option value="Madrid">&#x1F1EA;&#x1F1F8; Madrid, ES</option>
                                <option value="Tokyo">&#x1F1EF;&#x1F1F5; Tokyo, JP</option>
                                <option value="Sydney">&#x1F1E6;&#x1F1FA; Sydney, AU</option>
                                <option value="Lagos">&#x1F1F3;&#x1F1EC; Lagos, NG</option>
                            </select>
                        </div>
                        <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            @if(!empty($data))
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <!-- Location Details -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Looks Like</h5>
                            <br>
                            <b>{{ $data['weather'][0]['description'] ?? '--' }}</b>
                        </div>
                    </div>
                </div>

                <!-- Temperature Information -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Locations Details</h5>
                            <br>
                            <p class="card-text">Country:<b>{{ $data['sys']['country'] ?? '--' }}</b></p>
                            <p class="card-text">Name: <b>{{ $data['name'] ?? '--' }}</b></p>
                            <p class="card-text">Latitude: <b>Latitude: <b>{{ $data['coord']['lat'] ?? '--' }}</b></p>
                            <p class="card-text">Longitude: <b>{{ $data['coord']['lon'] ?? '--' }}</b></p>
                            <p class="card-text">Sunrise: <b>{{ isset($data['sys']['sunrise']) ? date('H:i:s', $data['sys']['sunrise']) : '--' }}</b></p>
                            <p class="card-text">Sunset: <b>{{ isset($data['sys']['sunset']) ? date('H:i:s', $data['sys']['sunset']) : '--' }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Temperature ( °F )</h5>
                            <br>
                            <p class="card-text">Temperature: <b>{{ $data['main']['temp'] ?? '--' }} °F</b></p>
                            <p class="card-text">Min: <b>{{ $data['main']['temp_min'] ?? '--' }} °F</b></p>
                            <p class="card-text">Max: <b>{{ $data['main']['temp_max'] ?? '--' }} °F</b></p>
                            <p class="card-text">Feels Like: <b>{{ $data['main']['feels_like'] ?? '--' }} °F</b></p>
                        </div>
                    </div>
                </div>

                <!-- Precipitation and Humidity -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Precipitation</h5>
                            <br>
                            <p class="card-text">Humidity: <b>{{ $data['main']['humidity'] ?? '--' }} %</b></p>
                            <p class="card-text">Pressure: <b>{{ $data['main']['pressure'] ?? '--' }} hPa</b></p>
                            <p class="card-text">Sea Level: <b>{{ $data['main']['sea_level'] ?? '--' }} hPa</b></p>
                            <p class="card-text">Ground Level: <b>{{ $data['main']['grnd_level'] ?? '--' }} hPa</b></p>
                            <p class="card-text">Visibility: <b>{{ $data['visibility'] ?? '--' }} m<</b></p>
                        </div>
                    </div>
                </div>

                <!-- Wind Information -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Wind Speed</h5>
                            <br>
                            <p class="card-text">Speed: <b>{{ $data['wind']['speed'] ?? '--' }} m/s</b></p>
                            <p class="card-text">Degree: <b>{{ $data['wind']['deg'] ?? '--' }}&deg;</b></p>
                        </div>
                    </div>
                </div>        
            </div>
            @endif
        </div>
        <br><br>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">© 2024 Manuel's Sample Site. All Rights Reserved.</span>
            </div>
    </body>
</html>