<?= $this->extend('layout/template'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="/css/add-style.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container ">
    <div class="row mt-5">
        <div class="col-md">
            <h1>Edit Service</h1>
            <img src="/Img/Logo/4.jpg" class="img-fluid" alt="logo">
        </div>
        <div class="col-md vertical-center">
            <form action="/Service/update/<?= $service->id; ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" value="<?= $service->slug; ?>" name="slug">
                <div class="mb-3">
                    <?php $cat; ?>
                    <?php if (old('category')) : ?>
                        <?php $cat = old('category'); ?>
                    <?php else : ?>
                        <?php $cat = $service->catId; ?>
                    <?php endif; ?>
                    <label class="form-label" for="category">Select Category</label>
                    <select class="form-select <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" id="category" name="category" autofocus>
                        <?php foreach ($category as $c) : ?>
                            <?php if ($c['categoryId'] == $cat) : ?>
                                <option selected value="<?= $c['categoryId']; ?>"><?= $c['categoryValue']; ?></option>
                            <?php else : ?>
                                <option value="<?= $c['categoryId']; ?>"><?= $c['categoryValue']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $validation->getError('category'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <?php $loc; ?>
                    <?php if (old('location')) : ?>
                        <?php $loc = old('location'); ?>
                    <?php else : ?>
                        <?php $loc = $service->locId; ?>
                    <?php endif; ?>
                    <label class="form-label" for="location">Select Location</label>
                    <select class="form-select <?= ($validation->hasError('location')) ? 'is-invalid' : ''; ?>" id="location" name="location">
                        <?php foreach ($location as $l) : ?>
                            <?php if ($l['locationId'] == $loc) : ?>
                                <option selected value="<?= $l['locationId']; ?>"><?= $l['locationValue']; ?></option>
                            <?php else : ?>
                                <option value="<?= $l['locationId']; ?>"><?= $l['locationValue']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $validation->getError('location'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="price">Price</label>
                    <input type="number" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?> " id="price" name="price" placeholder="Price..." value="<?= (old('price')) ? old('price') : $service->price; ?>">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $validation->getError('price'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Job Description</label>
                    <div class="form-floating">
                        <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id="description" style="height: 100px; resize: none;" name="description"><?= (old('description')) ? old('description') : $service->description; ?></textarea>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('description'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid gap-2 col-12 mx-auto">Edit Service</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>