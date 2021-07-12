"""
Assume our ticket object have two method, 'buy' and 'sell'.
Base on user input to run specific method. The case show that
what is introspection in ruby and how to make code clean.
"""
print "Information desired:"
request = gets.chomp

# Before
if request == "sell"
  puts ticket.sell
elsif request == "buy"
  puts ticket.buy
end

# After
if ticket.response_to?(request)
  puts ticket.__send__(request)
else
  puts "No such information available"
end
