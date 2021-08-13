array = [100,2,1,33,12]

def bubble_sort(array)
  length = array.size
  return array if length <= 1

  length.times do
    (length - 1).times do | i |
      if array[i] > array[i + 1]
        array[i], array[i + 1] = array[i + 1], array[i]
        swapped = true
      end
    end
  end
  return array
end

puts bubble_sort array
