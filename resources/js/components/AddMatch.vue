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
						<div class="form-group col-md-6 p-0 m-0">
							<label>Number of Games</label>
							<input type="number" class="form-control" @keypress="checkHandicapDependencies()" v-model="number_of_matches">
						</div>
						<div v-if="checkIfReady()">
							<div class="form-group mt-2">
								<label>Options</label>
								<br>
								<div style="display: inline-block">
									<input type="checkbox" v-model="options.f10k">&nbsp; F10K
									<input type="checkbox" v-model="options.game_winner" style="margin-left:20px;">&nbsp; Game Winner
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
						<button class="btn btn-primary float-right">Save</button>
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
				categories:[],
				teams:[],
				events:[],
				category_id:0,
				event_id:0,
				team_a:0,
				team_b:0,
				number_of_matches:1,
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
			loadCategories(){
				axios.get('/api/categories')
					 .then(res => {
					 	console.log(res.data);
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
					this.options.team_a_minus_one_point_five = false;
					this.option.team_b_minus_one_point_five = false;
				}
			},
			checkHandicap(){
				if(this.handicap == false){
					this.options.team_a_minus_one_point_five = false;
					this.option.team_b_minus_one_point_five = false;	
				}
			}
		}
		
	}
</script>