<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Settings
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" wire:model="email" placeholder="Email"
                                        class="form-control input-md">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="phone" placeholder="Phone"
                                        class="form-control input-md">
                                        @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Phone2</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="phone2" placeholder="Phone"
                                        class="form-control input-md">
                                        @error('phone2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="address" placeholder="Address"
                                        class="form-control input-md">
                                        @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="map" placeholder="Address"
                                        class="form-control input-md">
                                        @error('map')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Twiter</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="twiter" placeholder="Twiter"
                                        class="form-control input-md">
                                        @error('twiter')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="facebook" placeholder="Facebook"
                                        class="form-control input-md">
                                        @error('facebook')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Pinterest</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="pinterest" placeholder="Pinterest"
                                        class="form-control input-md">
                                        @error('pinterest')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="instagram" placeholder="Instagram"
                                        class="form-control input-md">
                                        @error('instagram')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="youtube" placeholder="Youtube"
                                        class="form-control input-md">
                                        @error('youtube')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
