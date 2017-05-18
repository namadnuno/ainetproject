<template>
	<div class="inline">
		<a class="card-footer-item" @click="open">
			Remover
		</a>
		<div class="modal" :class="{ 'is-active' : isActive }">
			<div class="modal-background"></div>
			<div class="modal-card">
				<header class="modal-card-head">
					<p class="modal-card-title">Certificação</p>
					<button class="delete" @click='close'></button>
				</header>
				<section class="modal-card-body">
					Tem a certeza que quer remover o pedido ?
				</section>
				<footer class="modal-card-foot has-text-right">
					<form :action="route" method="post">
						<input type="hidden" name="_token" :value="token">
						<input type="hidden" name="_method" value="DELETE">
						<a class="button" @click.preventDefault='close'>
							Calcelar
						</a>
						<button class="button is-danger">
							Sim
						</button>
					</form>
				</footer>
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