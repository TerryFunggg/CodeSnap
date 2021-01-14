def selection_sort(array)
  newArray = []
  array.length.times do
    index = find_smallest array
    newArray << array.delete_at(index)
  end

  newArray
end

# Hint: This is not prefect ruby ways
# it can just reutrn array.min
# But I want to try stupid ways
def find_smallest(arr)
  smallest_index = 0
  arr.size.times do |i|
    smallest_index = i if arr[i] < arr[smallest_index]
  end

  smallest_index
end
