<div class="mb-3">
    <label for="parent_id" class="control-label">يتفرع من</label>
    <select name="parent_id" id="parent_id" class="form-control select2">
        <option value="0" <?php if(isset($category['parent_id']) && $category['parent_id']==0): ?> selected <?php endif; ?>>رئيسي</option>
        <?php if(!empty($getGategory)): ?>
            <?php $__currentLoopData = $getGategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($parentcategory['id']); ?>" <?php if(isset($category['parent_id']) && $category['parent_id']==$parentcategory['id']): ?> selected <?php endif; ?>><?php echo e($parentcategory['category_name']); ?></option>
            <?php if(!empty($parentcategory['subCategory'])): ?>
             <?php $__currentLoopData = $parentcategory['subCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($subcategory['id']); ?>" <?php if(isset($category['parent_id']) && $category['parent_id']==$subcategory['id']): ?> selected <?php endif; ?>>&nbsp;&raquo;&nbsp;<?php echo e($subcategory['category_name']); ?></option>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
</div><?php /**PATH D:\myproject1\mido-shops\resources\views/admin/categories/append_cat_level.blade.php ENDPATH**/ ?>