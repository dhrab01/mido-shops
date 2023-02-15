<div class="mb-3">
    <label for="parent_id" class="control-label">نوع الصنف</label>
    <select name="parent_id" id="parent_id" class="form-control select2">
        <option value="0" @if(isset($category['parent_id']) && $category['parent_id']==0) selected @endif>رئيسي</option>
        @if(!empty($getGategory))
            @foreach($getGategory as $parentcategory)
            <option value="{{ $parentcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$parentcategory['id']) selected @endif>{{ $parentcategory['category_name'] }}</option>
            @if(!empty($parentcategory['subCategory']))
             @foreach($parentcategory['subCategory'] as $subcategory)
             <option value="{{ $subcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$subcategory['id']) selected @endif>&nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}</option>
             @endforeach
            @endif
            @endforeach
        @endif
    </select>
</div>