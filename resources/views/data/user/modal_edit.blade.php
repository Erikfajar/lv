<div class="modal  fade" id="modaldemo8{{ $dt->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Form Update Data User</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('data_user.update',$dt->id) }}" method="post">
                    @csrf @method('PUT')
                    <p class="mg-b-20">Harap untuk di isi semua!!</p>
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Username</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Enter your Username" name="username" value="{{ $dt->username }}" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Email</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Enter your Email" name="email" value="{{ $dt->email }}" type="email">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Password</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Enter your Password Baru" type="text" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Nama Lengkap</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Enter your Nama Lengkap" type="text" name="nama_lengkap" value="{{ $dt->nama_lengkap }}">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Role</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <div class="custom-controls-stacked">
                                <label class="custom-control form-radio">
                                    <input type="radio" class="custom-control-input" name="role" value="administrator" {{ $dt->role === 'administrator' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Administrator</span>
                                </label>
                                <label class="custom-control form-radio">
                                    <input type="radio" class="custom-control-input" name="role" value="petugas" {{ $dt->role === 'petugas' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Petugas</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>