def binary_search(list,item)
  low = 0
  high = list.size - 1

  while low <= high do
    mid = (low + high) / 2
    guess = list[mid]
    high = mid - 1 if guess > item
    low = mid + 1 if guess < item
    return mid if guess == item
  end
end

