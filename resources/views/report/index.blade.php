<x-app-layout>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Main Functions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="/report/show" method="GET">
                    <label for="date">Choose Date for Report</label>
                    <input type="date" class="form-control mb-2" id="date" name="dateStart">
                    <input type="date" class="form-control" id="date" name="dateEnd">
                    <button class="btn btn-primary mt-3" type="submit">Show Report</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
