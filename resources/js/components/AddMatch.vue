<template>
	<div>

		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card card-primary">
					<div class="card-header">
						ADD MATCH
					</div>
					<div class="card-body">

						<div class="form-group">
							<label>Categories</label>
							
							<v-select v-model='category_id' :options="categories" :reduce="name => name.id" label="name"></v-select>
						</div>
						<div class="form-group">
							<label>Event</label>
							<v-select v-model='event_id' :options="events" :reduce="name => name.id" label="name"></v-select>
						</div>
						<div class="form-group">
							<label>Team A</label>
							<v-select v-model='team_a' :options="teams" :reduce="descriptive_name => descriptive_name.id" label="descriptive_name"></v-select>
						</div>
						<div class="form-group">
							<label>Team B</label>
							<v-select v-model='team_b' :options="teams" :reduce="descriptive_name => descriptive_name.id" label="descriptive_name"></v-select>
						</div>
						<div class="form-group">
						<div class="row mx-0">
							<div class="col-md-6 mx-0 px-0">
								<input type="date" class="form-control" v-model="date">
							</div>
							<div class="col-md-6">
								<input type="time" class="form-control" v-model="time">
							</div>
						</div>
						</div>
						<div class="form-group col-md-6 p-0 m-0">
							<label>Number of Games</label>
							<input type="number" class="form-control" @keyup="checkHandicapDependencies()" v-model="number_of_matches">
						</div>

						<div v-if="checkIfReady()">
							<div class="form-group mt-2">
								<label>Options</label>
								<br>
								<div style="display: inline-block">
									<input type="checkbox" v-model="options.f10k">&nbsp; F10K
									<span v-if="number_of_matches > 1"><input type="checkbox"  v-model="options.game_winner" style="margin-left:20px;">&nbsp; Game Winner</span>
									<span v-if="number_of_matches > 1"><input type="checkbox" @click="checkHandicap()" v-model="options.handicap" style="margin-left:20px;">&nbsp;Enable Handicap</span>
									<span v-if="options.handicap">
										<input type="checkbox" v-model="options.team_a_minus_one_point_five" style="margin-left:20px;">&nbsp;Game Handicap [{{team_a_name()}} -1.5]
										<input type="checkbox" v-model="options.team_b_minus_one_point_five" style="margin-left:20px;">&nbsp;Game Handicap [{{team_b_name()}} -1.5]
									</span>
								</div>

							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary float-right" @click="addMatch()">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		data(){
			return{
				names:['Match Winner','Game 1 Winner','Game 2 Winner','Game 3 Winner','Game 4 Winner','Game 5 Winner'],
				categories:[],
				teams:[],
				events:[],
				category_id:0,
				event_id:0,
				team_a:0,
				team_b:0,
				number_of_matches:1,
				date:'',
				time:'',
				options: {
					f10k: false,
					game_winner: false,
					handicap: false,
					team_a_minus_one_point_five: false,
					team_b_minus_one_point_five: false,
				}
			}
		},
		created(){
			this.loadCategories();
			this.loadTeams();
			this.loadEvents();
		},
		methods: {
			addMatch(){
				var formdata = new FormData();
				formdata.append('category_id',this.category_id);
				formdata.append('event_id',this.event_id);
				formdata.append('team_a',this.team_a);
				formdata.append('team_b',this.team_b);
				formdata.append('number_of_matches',this.number_of_matches);
				formdata.append('date',this.date);
				formdata.append('time',this.time);
				formdata.append('number_of_matches',this.number_of_matches);
				formdata.append('options',JSON.stringify(this.options));
				axios.post('/admin/matches/save',formdata)
					 .then(res => {
					 	console.log(res.data);
					 	alert('success');
					 	window.location='/admin/matches/create';
					 })
					 .catch(err => {
					 	console.log(err);
					 });
			},
			loadCategories(){
				axios.get('/api/categories')
					 .then(res => {
					 
					 	this.categories = res.data.data;
					 })
					 .catch(err => {
					 	console.log(err);
					 });
			},
			loadTeams(){
				axios.get('/api/teams')
					 .then(res => {
					 	this.teams = res.data.data;
					 })
					 .catch(err => {
					 	console.log(err);
					 });
			},
			loadEvents(){
				axios.get('/api/events')
					 .then(res => {
					 	this.events = res.data.data;
					 })
					 .catch(err => {
					 	console.log(err);
					 });
			},
			checkIfReady(){
				if(this.team_a != 0 && this.team_a != null && this.team_b != 0 && this.team_b != null){
					return true;
				}else{
					return false;
				}
			},
			team_a_name(){
				const team_a = this.teams.filter(team => team.id == this.team_a);
				var team1 = team_a[0];
				return team1.name;
			},
			team_b_name(){
				const team_b = this.teams.filter(team => team.id == this.team_b);
				var team2 = team_b[0];
				return team2.name;
			},
			checkHandicapDependencies(){
				// alert('hey');
				if(this.number_of_matches < 2){
					this.options.handicap = false;
					if (this.options.team_a_minus_one_point_five){
						this.options.team_a_minus_one_point_five = false;	
					}
					if (this.options.team_b_minus_one_point_five){
						this.options.team_b_minus_one_point_five = false;	
					}
					
				}
			},
			checkHandicap(){
				
				if(this.options.handicap == false){
					this.options.team_a_minus_one_point_five = false;
					this.options.team_b_minus_one_point_five = false;	
				}
			}
		}
		
	}
</script>