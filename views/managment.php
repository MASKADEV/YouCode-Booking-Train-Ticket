<?php require_once 'components/header.php' ?>
    <div class="title mt-4 d-flex flex-row">
        <h1>Managment</h1>
        <button id="popup-btn" class = "btn btn-outline-primary ms-3" style ="margin:0px; padding:10px">Add Trip</button>
    </div>

    <!-- Manage Trip Delete  -->

    <div class="d-flex flex-column mt-5 ms-2 me-2">
        <div class="managment-left-container d-flex flex-column justify-content-center align-items-center w-100">
            <h2 class = "title fw-bold mb-4">MANAGE TRIP</h2>
            <?php 
                require_once('models/connection.php');
                $db = new Connection();
                $result = $db->fetchTrip();?>
            <table class ="table container">
                <thead class="table-dark">
                    <tr>
                    <th>Depart</th>
                    <th>Arrive</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $key=>$value): ?>
                        <tr>
                            <th><?php echo $value['depart_city'] ?></th>
                            <th><?php echo $value['arrive_city'] ?></th>
                            <th><?php echo $value['date'] ?></th>
                            <th><?php echo $value['price'] ?></th>
                            <td><a href="<?php echo "http://172.16.139.9/Booking_Train/managment/deleteBooking/" . $value['id']; ?>" class="text-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

            
    
        <!-- Fetch All booking  -->
        <div class="managment-right-containers d-flex flex-column justify-content-center align-items-center w-100">
            <h2 class="title fw-bold mb-4 mt-4">ALL RESERVATION</h2>
        </div>
        <table class ="table mt-4 fw-bold mb-4 container">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Full name</th>
                    <th scope="col">Depart City</th>
                    <th scope="col">Arrive City</th>
                    <th scope="col">Operation</th>
                    </tr>
                </thead>
                <?php foreach($booking_result as $key => $value) :?>
                <tbody>
                    <tr>
                        <td><?=$value['full_name']?></td>
                        <td><?=$value['depart_city']?></td>
                        <td><?=$value['arrive_city']?></td>
                        <td><a href ="<?php echo "http://172.16.139.9/Booking_Train/managment/deletebooking/" . $value['id']; ?>" class ="btn text-danger fw-bold" style="margin:0px; padding:0px">Delete Booking</a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
    </div>


    <!-- Add Trip -->
        <div class="w-100 mt-5 d-flex justify-content-center align-items-center">
            <div class="mt-5 position-absolute popup-container" id="popup-wrapper" >
                <Form action = "http://172.16.139.9/Booking_Train/managment/addTrip" method = "POST">
                        <h2 class = "title fw-bold">ADD TRIP</h2>
                        <div class="input-group mt-4 ps-2 pe-2">
                            <label class="input-group-text" for="inputGroupSelect01">Depart</label>
                            <select class="form-select" id="inputGroupSelect01" name = "depart_city" required>
                                <?php 
                                    $cities = $db->selectAll('cities');?>
                                <?php foreach($cities as $key=>$value): ?>
                                        <option value="<?php echo $value['city']?>"><?php echo $value['city']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mt-4 ps-2 pe-2">
                            <label class="input-group-text" for="inputGroupSelect01">Arrive</label>
                            <select class="form-select" id="inputGroupSelect01" name = "arrive_city" required>
                                <?php 
                                    $cities = $db->selectAll('cities');?>
                                <?php foreach($cities as $key=>$value): ?>
                                        <option value="<?php echo $value['city']?>"><?php echo $value['city']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                            <div class="mt-4">
                                <label for="place_number" class="form-label">Number Place</label>
                                <input type="number" min="1" class="form-control" id="place_number" name="place_number" required>
                            </div>
                            <div class="mt-4">
                                <label for="Date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="Date" name="date"  min="<?= date("Y-m-d", strtotime("+1 day")) ?>" required>
                            </div>
                            <div class="mt-4">
                                <label for="depart_time" class="form-label">Depart Time</label>
                                <input type="time" class="form-control" id="depart_time" name="depart_time" required>
                            </div>
                            <div class="mt-4">
                                <label for="arrive_time" class="form-label">Arrive Time</label>
                                <input type="time" class="form-control" id="arrive_time" name="arrive_time" required>
                            </div>
                            <div class="mt-4">
                                <label for="priceid" class="form-label">Price</label>
                                <input type="number" min="1" class="form-control" id="priceid" name="price" required>
                            </div>
                        <div>
                        <button class= "btn btn-primary mt-4 d-grid col-5 mx-auto pt-2 pb-2" type="submit">ADD</button>
                        <a class= "btn btn-danger mt-4 d-grid col-5 mx-auto pt-2 pb-2" id="btn-cancel" >Cancel</a>
                        </div>
                </Form>
            </div>
        </div>
       
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="public/js/managment.js"></script>
</body>
</html>