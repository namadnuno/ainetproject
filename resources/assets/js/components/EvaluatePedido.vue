<template>
	<div class="inline">
		<a class="card-footer-item" @click="open">
			Avaliar
		</a>
		<div class="modal" :class="{ 'is-active' : isActive }">
			<div class="modal-background"></div>
			<div class="modal-card">
				<header class="modal-card-head">
					<p class="modal-card-title">Avalie esta Impressão</p>
					<button class="delete" @click='close'></button>
				</header>
				<form :action="route" method="post">

				<section class="modal-card-body">
					<input type="hidden" name="_token" :value="token">
						<input type="hidden" name="_method" value="PUT">
						<div class="field">
                            <label for="satisfaction_grade">Qualidade da impressão</label>
                            <p class="control">
                                <span class="select">
                                    <select name="satisfaction_grade">
                                        <option>Avalie</option>
                                        <option value="1">Má</option>
                                        <option value="2">Razoável</option>
                                        <option value="3">Boa</option>
                                    </select>
                                </span>
                            </p>
                        </div>
				</section>
				<footer class="modal-card-foot has-text-right">
						<a type="button" class="button" @click.preventDefault='close'>
							Calcelar
						</a>
						<button type="submit" class="button is-danger">
							Avaliar
						</button>
				</footer>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		props: ['route', 'token'],
		data() {
			return {
				isActive: false
			}
		},
		methods: {
			open() {
				this.isActive = true; 
			},
			close () {
				this.isActive = false; 
			}
		}
	}
</script>