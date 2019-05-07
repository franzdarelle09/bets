<template>
	<div>
		<div class="row">
			<div class="col-md-12">
				<a href="/admin/matches/create" class="btn btn-primary float-right mb-4">Add Match</a>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-12">

				<table class="table table-striped table-bordered table-fluid">
				<thead>
					<tr>
						<th>Match</th>
						<th>Type</th>
						<th>Number of Games</th>
						<th>Status</th>
						<th>Event</th>
						<th>Link</th>
						<th>Winners</th>
						<th>Category</th>
						<th>Time Remaining</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="match in matches" :key="match.id">
						<td class="align-middle">{{match.team_a.name}} vs {{match.team_b.name}}</td>
						<td class="align-middle">{{match.name}}</td>
						<td class="align-middle">{{match.number_of_matches}}</td>
						<td class="align-middle">{{match.match_status}}</td>
						<td class="align-middle">{{match.event.name}}</td>
						<td class="align-middle"><a href="#">Link</a></td>
						<td class="align-middle">{{match.winner || 'not yet decided' }}</td>
						<td class="align-middle">{{match.category.name}}</td>
						<td class="align-middle">{{getTimeNow(match.scheduled_date)}}</td>
						<td class="text-center align-middle">
							<button class="btn btn-primary m-1" style="width: 135px;">Declare a winner</button>
							<button class="btn btn-success m-1" style="width: 135px;">Change Status</button>
							<button class="btn btn-danger m-1" style="width: 135px;">Delete Match</button>
						</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</template>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
	export default{
		data(){
			return{
				matches:[]
			}
		},
		created(){
			this.loadMatches();
		},
		methods: {
			loadMatches(){
				axios.get('/api/matches')
					 .then(res => {
					 	this.matches = res.data.data;
					 })
					 .catch(err => {
					 	console.log(err);
					 });
			},
			getTimeNow(scheduled_date){
				//let now = moment(new Date());
				let now =  moment(scheduled_date).fromNow();
				return now;
				
			}
		}
	}
</script>
