result = (1..5).map do | num |
  num * num
end.map do |num|
  num + 100
end

puts result
