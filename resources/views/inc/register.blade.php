<div class="container bg-white mt-3 mb-3 border rounded">
    <form action="/registration" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-3">
            <div class="form-group col">
                <select name="gender" id="" class="form-control">
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group col">
                <select name="birth_month" id="" class="form-control">
                    <option value="" disabled selected>Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="form-group col">
                <select name="birth_day" id="" class="form-control">
                    <option value="" selected disabled>Birth Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
            <div class="form-group col">
                <input type="text" name="birth_year" placeholder="Year" class="form-control">
            </div>
        </div>
        <div class="row m-3">
            <div class="form-group col">
                <input type="text" name="firstname" placeholder="First Name" class="form-control">
            </div>        
            <div class="form-group col">
                <input type="text" name="middlename" placeholder="Middle Name" class="form-control">
            </div>
            <div class="form-group col">
                <input type="text" name="lastname" placeholder="Last Name" class="form-control">
            </div>
        </div>
        <div class="row m-3">
            <div class="form-group col">
                <input type="text" name="school" placeholder="School" class="form-control">
            </div>
        </div>
        <div class="row m-3">
            <div class="form-group col">
                <input type="text" placeholder="Parent's Name (Mother or Father)" name="parent" class="form-control">
            </div>
            <div class="form-group col">
                <input type="text" name="mobile" placeholder="Mobile Number" class="form-control">
            </div>
        </div>
        <div class="row m-3">
            <div class="col">
                <input type="submit" value="Submit" class="btn btn-outline-primary float-right">
            </div>
        </div>
    </form>
</div>