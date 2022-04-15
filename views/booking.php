<?php require_once 'components/header.php' ?>
    <div class="title mt-5">
        <h1>Search For Trip</h1>
    </div>
    <div class="container mt-4">
        <form method = "POST" action = "/Booking-train-ticket/booking/search">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="first">Depart City</label>
                    <select class="form-select" id="inputGroupSelect01" name = "depart_city" required>
                        <?php             
                            require_once('models/connection.php');
                            $db = new Connection();
                            $cities = $db->selectAll('cities');?>
                        <?php foreach($cities as $key=>$value): ?>
                                <option value="<?php echo $value['city']?>"><?php echo $value['city']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="first">Arrive City</label>
                    <select class="form-select" id="inputGroupSelect01" name = "arrive_city" required>
                        <?php    
                            require_once('models/connection.php');
                            $db = new Connection();
                            $cities = $db->selectAll('cities');?>
                        <?php foreach($cities as $key=>$value): ?>
                                <option value="<?php echo $value['city']?>"><?php echo $value['city']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                </div>
                <button type ="submit" class="btn mx-auto btn-primary w-25 mt-4 mb-4 fw-bold" style="background-color:#4A1FA9" id="btn-search">Search</button>
        </form>
        </div>
        <?php if(isset($_SESSION['id'])) :?>
        <div class="title mt-5 mb-4">
        <h1>My Booking</h1>
        </div>
        <table class ="table mt-4 fw-bold">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Depart City</th>
                    <th scope="col">Arrive City</th>
                    <th scope="col">Trip Date</th>
                    <th scope="col">Operation</th>
                    </tr>
                </thead>
                <?php foreach($result as $key => $value) :?>
                <?php if($value['date'] >= date("Y-m-d")): ?> 
                <?php 
                    $date_trip = date('Y-m-d h:i', strtotime($value['date'] . "  " .$value['depart_time']));
                    $date = new DateTime($date_trip);
                    $trip_date_year = ($date->format('Y'));
                    $trip_date_month = ($date->format('m'));
                    $trip_date_day = ($date->format('d'));
                    $trip_time = date_create($date->format('H:i'));
                    $cancel_available = false;
                    if(date("m") <= $trip_date_month) {
                        if(date("d") <= $trip_date_day){
                            $currentTime = date_create(date("H:i"));
                            $difference = date_diff($currentTime, $trip_time);
                            $minutes = $difference->days * 24 * 60;
                            $minutes += $difference->h * 60;
                            $minutes += $difference->i;
                            echo $minutes . " ";
                            if($minutes < 60) {
                                $cancel_available = false;
                            }else {
                                $cancel_available = true;
                            }
                        }
                        else {
                            $cancel_available = false;
                        }
                    }else {
                        $cancel_available = false;
                    }
                ?>
                <tbody>
                    <tr>
                        <td><?= $value['depart_city'] ?></td>
                        <td><?= $value['arrive_city'] ?></td>
                        <td><?= $value['date'] . "  " .$value['depart_time'] ?></td>
                        <td><a href="<?php if ($cancel_available == true){ echo 'http://localhost/Booking-train-ticket/booking/deleteBooking/' . $value['id'];} {echo "";}?>" class ="btn text-danger fw-bold" style="margin:0px; padding:0px">Cancel Trip</a></td>
                    </tr>
                </tbody>
                <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php endif ?>
    </div>
                    
<?php require_once 'components/footer.php' ?>
