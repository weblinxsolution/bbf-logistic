public function update_order_status(Request $request)
{
$order_id = $request->order_id;
$order_status_id = $request->status_type;

if (str_replace(' ', '-', $request['check_status']) == 'final-status') {
Orders::where('id', $order_id)->update([
"status_type_id" => $order_status_id,
"pickup_date" => $request->pickup_date,
"status" => 1
]);
} else {
Orders::where('id', $order_id)->update([
"status_type_id" => $order_status_id,
"pickup_date" => $request->pickup_date,
]);
}

$containersJsonStrings = $request['containers'];

// Initialize an empty array to store decoded containers
$containers = [];

// Loop through each JSON string and decode it
foreach ($containersJsonStrings as $jsonString) {
// Decode the JSON string and add it to the $containers array
$containers[] = json_decode($jsonString, true); // Set the second parameter to true to get an associative array
}

// Now $containers is an array of associative arrays representing your containers

// You can loop through $containers and access values like this:
foreach ($containers as $container) {
if ($request['count']) {
foreach ($request['count'] as $Cid) {

if ($Cid == $container['id']) {
for ($i = 0; $i < $container['quantity']; $i++) { # code... $check=new Check; $check->order_id = $order_id;
    $check->container_id = $container['id'];
    $check->status_id = $order_status_id;
    $check->check = $i;
    $check->created_order_date = $request->pickup_date;
    $check->status = 0;
    $check->save();
    }
    }

    // Check::where('id', $id)->update([
    // "status_id" => $order_status_id,
    // "status" => 1
    // ]);
    }
    }
    // Access other properties as needed...
    }





    $fileName = null;
    if ($request->hasFile('file')) {
    $fileName = time() . '.' . $request->file->extension();
    $request->file->move(public_path('documents'), $fileName);
    }

    $tracking = new OrderTracking;
    $tracking->order_id = $order_id;
    $tracking->status_id = $order_status_id;
    $tracking->cargo_remark = $request->cargo_remark;
    $tracking->document = $fileName;
    $tracking->created_order_date = $request->pickup_date;
    $tracking->save();

    return redirect()->route('admin.orderManagement')->with('success', 'Order Successfully Updated');

    }