class Model
  def self.belongs_to(obj)
    # using define_method to define a method :)
    define_method "#{obj}=" do |val|
      @obj = val
    end

    define_method obj do
      @obj
    end

    define_singleton_method "find_by_#{obj}" do |arg|
      t = Product.new
      t.send("#{obj}=",arg)
      t
    end
  end
end

class Shop
end

class Product < Model
  belongs_to :shop
end

shop = Shop.new
product = Product.new
product.shop = shop

puts product.shop == shop #=> true

# test singleton method
product2 = Product.find_by_shop(shop)
puts product2.shop == product.shop #=> true
